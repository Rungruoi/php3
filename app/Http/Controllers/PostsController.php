<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\EditPostRequest;
use App\Post;
use App\Category;
use Carbon\Carbon;
class PostsController extends Controller
{
    public function homepage(Request $request) {
   
	$kw=$request->keyword;
	if(!$request->has('keyword') || empty($kw)){
	$posts=Post::orderBy('id','DESC')->paginate(9);
	}else{
		$posts=Post::where('title','like',"%$kw%")->orderBy('id','DESC')->paginate(9);
		//phân trang chi tiết
		  $posts->withPath("admin/?keyword=$kw");
	}

    return view('admin.HomePage',['ds'=>$posts]);
	}

	
	

	public function addForm(){
		$cates = Category::all();
    	
    	return view('post.add-form', compact('cates'));
    }

    public function remove($id){
    		DB::beginTransaction();
    		try{
				$model=Post::find($id);
			
				if($model){
				$model->delete();
				DB::commit();
			}
    		}catch(Exception $ex){
    			DB::rollback();
    		}
		return redirect()->route('homepage');	
	}
	public function saveAdd(AddPostRequest  $request){

    	
		$model=new Post();
		$model->fill($request->all());
		if($request->hasFile('image')){
           	
            $oriFileName = $request->image->getClientOriginalName();
            //thay thế ký tự khoảng trắng bằng ký tự -
            $filename = str_replace(' ', '-', $oriFileName);
            //thêm doạn chuỗi khoảng bị trùng dằng trước tên ảnh
            $filename = uniqid() . '-' . $filename;
            // trong storage phải đổi lại đường truyền config->filesystems
            $path=$request->file('image')->storeAs('posts', $filename);

            $model->image ='image/'.$path;
                  
        }
		DB::beginTransaction();
		try{
				$model ->save();
				DB::commit();
		}catch(Exception $ex){
			DB::rollback();
		}

		return redirect()->route('homepage');

	}
	public function edit($id){
		$cates=Category::all();
		$post=Post::find($id);
		return view('post.edit-post',compact('cates','post'));
	}
	public function saveedit(EditPostRequest $request,$id){
		
		$model=Post::find($id);
		$date=$model->publish_date;
		$model->where('id',$id)->update(
      [
        'title'=>$request->title,
        'content'=>$request->content,
       	
        'auther'=>$request->auther,
        'status'=>$request->status,
        'cate_id'=>$request->cate_id,
       // 'publish_date'=>$request->publish_date,
      ]
    );
		//dd($request->publish_date);
		if(!$request->publish_date=="null"){
			$model->publish_date=$date;
			//dd($date);
		}else{
			$model->publish_date=$request->publish_date;

		}
		if($request->hasFile('image')){
           	
            $oriFileName = $request->image->getClientOriginalName();
            //thay thế ký tự khoảng trắng bằng ký tự -
            $filename = str_replace(' ', '-', $oriFileName);
            //thêm doạn chuỗi khoảng bị trùng dằng trước tên ảnh
            $filename = uniqid() . '-' . $filename;
            // trong storage phải đổi lại đường truyền config->filesystems
            $path=$request->file('image')->storeAs('posts', $filename);

            $model->image ='image/'.$path;
                  
        }
        DB::beginTransaction();
		try{
				$model->save();
				DB::commit();
		}catch(Exception $ex){
			DB::rollback();
		}

		return redirect()->route('homepage');
	}
	
	
}
