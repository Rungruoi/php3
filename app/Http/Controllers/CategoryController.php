<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\AddCateRequest;
use App\Product;
use App\Post;
use App\Category;
use Carbon\Carbon;


class CategoryController extends Controller
{
   public function categories(Request $request){
    $kw=$request->keyword;
    if(!$request->has('keyword') || empty($kw)){
        $category=Category::orderBy('id','DESC')->paginate(5);
    }else{
        $category=Category::where('name','like',"%$kw%")->orderBy('id','DESC')->paginate(5);
        $category->withPath("admin/category/?keyword=$kw");
    }
    return view('cate.category',['cate'=>$category]);

   }
   public function addForm(){
    return view('cate.add-category');

   }
   public function remove($id){
    DB::beginTransaction();
    try{
        $model=Category::find($id);
        $id;
        $pro=Post::all()->where('cate_id','=','$id')->count();
        $product=Product::where('pro_id', '=', '5')->count();

        dd($product);
        if($model){
            
            $model->delete();
           // $pro-> delete();
           // $product-> delete();
            DB::commit();
        }
        }catch(Exception $ex){
            DB::rollback();
        }
        return redirect()->route('categories');
    }
   
   public function saveAdd(AddCateRequest $request){
  
    $model=new Category;
    $model->fill($request->all());
    DB::beginTransaction();
    try{
        $model->save();
        DB::commit();
    }catch(Exception $ex){
        DB::rollback();
    }
    return redirect()->route('categories');
   }

   public function edit($id){
    $cates=Category::find($id);

    return view('cate.edit-category',['cate'=>$cates]);

   }
   public function saveedit(Request $request,$id){
    $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:16',
        'description' => 'required',
    ],
    [

      'description.required'=>"Nhập mô tả danh mục",
    ]
  );
    
    $cate=Category::find($id);
    $cate->where('id',$id)->update(
      [
        'name'=>$request->name,
        'description'=>$request->description
      ]
    );
    
    
    return redirect()->route('categories');
   }

   
}
