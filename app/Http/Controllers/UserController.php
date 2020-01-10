<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use App\User;
use Carbon\Carbon;


class UserController extends Controller
{
  public function users(Request $request) {

		$kw=$request->keyword;
		if(!$request->has('keyword') || empty($kw)){
			$Username=User::where('role','<>',900)->paginate(9);
		}else{
			$Username=User::where([['name','like',"%$kw%"],['role','<>',900]])->orderBy('id','DESC')->paginate(5);
            //phân trang chi tiết
			$Username->withPath("admin/user/?keyword=$kw");
		}

		return view('user.user',['users'=>$Username]);
	}

	public function remove($id){
		DB::beginTransaction();
    		try{
				$model=User::find($id);
			
				if($model){
				$model->delete();
				DB::commit();
			}
    		}catch(Exception $ex){
    			DB::rollback();
    		}
		return redirect()->route('user');
	}
	public function edit($id){
		$users=User::find($id);
		return view('user.edit-user',compact('users'));
	}
	public function saveedit(EditUserRequest $request,$id){
		$users=User::find($id);
		$users->where('id',$id)->update(
      [
        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'role'=>$request->role,
        'numberphone'=>$request->numberphone
      ]
    );
    return redirect()->route('user');
	}
	public function editprofile($id){
		$users=User::find($id);
		return view('user.edit-profile',compact('users'));
	}
	public function saveeditprofile(Request $request,$id){
		$validatedData =Validator::make($request->all(),[
        'name' => 'bail|required|min:2|max:190',
        'password'=>'bail|required',
        'newpass'=>'bail|required',
        'repass_confirmation'=>'bail|required|same:newpass',
        'address' => 'required',
        'numberphone'=>'bail|required|min:10|max:11|regex:/[0-9]/',

    ],[
        
    	'name.required'=>"Nhập tên tài khoản",
    	'name.min'=>"Tên tài khoản dài hơn 2 ký tự",
        
    	'password'=>"Nhập mật khẩu cũ của tài khoản",
    	'newpass'=>"Nhập mật khẩu mới!",
    	'repass_confirmation'=>"Mật khẩu không trùng khớp",
    	'address.required'=>"Nhập địa chỉ của bạn",
    	'numberphone'=>"Nhập số điện thoại",
    	'numberphone.integer'=>"Nhập đúng định dạng số điện thoại",
    	'numberphone.min'=>"Nhập đúng định dạng số điện thoại",
    	'numberphone.max'=>"Nhập đúng số dạng điện thoại",
        'numberphone.regex'=>"Số điện thoại không đúng định dạng",

    ]

	);
    if ($validatedData->fails()) {
        return View('user.edit-profile')->withErrors($validatedData);
    }
		$UsersName=User::find($id);
		if(password_verify($request->password, $UsersName['password']) == false){
			$mess="Mật khẩu không trùng khớp";
    		return view('user.edit-profile',compact('mess'));
        }
        //mã hóa mật khẩu mới
		$passwordnew= password_hash($request->newpass, PASSWORD_DEFAULT);
		
		$UsersName->where('id',$id)->update(
     	 [
        'name'=>$request->name,
        'address'=>$request->address,
        'password'=>$passwordnew,
        'numberphone'=>$request->numberphone
     	 ]
         
    );  
        $succes="Đổi mật khẩu thành công";

        return redirect()->route('logout',compact('succes'));
}
}
