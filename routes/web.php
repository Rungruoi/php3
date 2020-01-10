<?php
use Illuminate\Http\Request;


// Route::get('/', function () {
//     return view('HomePage');
// });
Route::get('/',function(){
	return view('client.index');
});

Route::get('forbidden', function(){
	return view('auth.403');
})->name('forbidden');

Route::get('detail',function(){
	return view('client.rental');
});

Route::get('register','Auth\RegisterController@index')->name('register.add');

Route::post('register','Auth\RegisterController@create');
Route::get('cp-login','Auth\LoginController@loginForm')->name('login');
//
Route::post('cp-login','Auth\LoginController@postLogin');
//login facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback','Auth\LoginController@handleProviderCallback');
//login gg
Route::get('auth/google','Auth\LoginController@ToProvider')->name('login/google');
Route::get('auth/google/callback','Auth\LoginController@Callback');
Route::get('logout',function(){
	Auth::logout();
	Session::flush();	
	return redirect()->route('homepage');
})->name('logout');

// 	return view('layouts.main');
// });


//Dinh danh cho rute
//group route MyGroup/route{User1}
Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('User1',function(){
		echo"User1";
	});
	Route::get('User2',function(){
		echo"User2";
	});
});
//goi controller @{tenfunction}
Route::get('goicontroller','MyController@Xinchao');
//truyen du lieu tu route qua controller de them sua xoa
Route::get('thamso/{ten}','MyController@Khoahoc');
//Rrquest URL
Route::get('Request','MyController@GetUrl');
Route::get('getForm',function(){
	return view('postForm');
});
Route::post('postForm',['as'=>'postForm','uses'=>'MyController@postForm']);
//cookie
Route::get('setCookie','MyController@setCookie');
Route::get('getCookie','MyController@getCookie');
//GUI File
Route::get('uploadFile',function(){
	return view('postFile');
});
Route::post('postFile',['as'=>'postFile','uses'=>'MyController@postFile']);
//json
Route::get('getJson','MyController@getJson');
//gọi view
Route::get('testview','MyController@myView');
Route::get('Time/{t}','MyController@Time');
// blade template
Route::get('blade',function(){
	return view('pages.php');
});
// sử dụng compact

