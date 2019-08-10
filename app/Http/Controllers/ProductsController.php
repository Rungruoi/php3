<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use App\Category;
use Carbon\Carbon;
class ProductsController extends Controller
{
	public function products(Request $request) {
		$kw=$request->keyword;
		if(!$request->has('keyword') || empty($kw)){
			$product=Product::orderBy('id','DESC')->paginate(9);
		}else{
			$product=Product::where('name','like',"%$kw%")->orderBy('id','DESC')->paginate(5);
			//$product->widthPath("admin/product/?keyword=$kw");
			//dd($product);
		}

		return view('product.products',['pro'=>$product]);
	}
	
	public function remove($id){
		DB::beginTransaction();
		try{
				$model=Product::find($id);
			
				if($model){
				$model->delete();
				DB::commit();
			}
    		}catch(Exception $ex){
    			DB::rollback();
    		}

		return redirect()->route('products');

	}
	public function addForm(){
		$cates= Category::all();
		return view('product.add-product',compact('cates'));
	}
	public function saveAdd(AddProductRequest $request){
		$model=new Product();
		$model->fill($request->all());
		if($request->hasFile('feature_image')){
           	
            $oriFileName = $request->feature_image->getClientOriginalName();
            //thay thế ký tự khoảng trắng bằng ký tự -
            $filename = str_replace(' ', '-', $oriFileName);
            //thêm doạn chuỗi khoảng bị trùng dằng trước tên ảnh
            $filename = uniqid() . '-' . $filename;
            // trong storage phải đổi lại đường truyền config->filesystems
            $path=$request->file('feature_image')->storeAs('products', $filename);

            $model->feature_image ='image/'.$path;

                  
        }
		DB::beginTransaction();
		try{
			$model->save();
			DB::commit();
		}catch(Exception $ex){
			DB::rollback();
		}
		return redirect()->route('products');
	}

	public function edit($id){
		$cates= Category::all();
		$pro=Product::find($id);
		return view('product.edit-product',compact('pro','cates'));
	}
	public function saveedit(EditProductRequest $request,$id){
		$model=Product::find($id);
		$model->where('id',$id)->update([
			'name'=>$request->name,
			'slug'=>$request->slug,
			'description'=>$request->description,
			'status'=>$request->status,
			'pro_id'=>$request->pro_id,
			'price'=>$request->price,

		]);

		if($request->hasFile('feature_image')){
           	
            $oriFileName = $request->feature_image->getClientOriginalName();
            //thay thế ký tự khoảng trắng bằng ký tự -
            $filename = str_replace(' ', '-', $oriFileName);
            //thêm doạn chuỗi khoảng bị trùng dằng trước tên ảnh
            $filename = uniqid() . '-' . $filename;
            // trong storage phải đổi lại đường truyền config->filesystems
            $path=$request->file('feature_image')->storeAs('products', $filename);
            

            $model->feature_image ='image/'.$path;
                  
        }
        DB::beginTransaction();
		try{
				$model->save();
				DB::commit();
		}catch(Exception $ex){
			DB::rollback();
		}

		return redirect()->route('products');

	}
	
	
}


