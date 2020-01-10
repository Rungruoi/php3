<?php
   
Route::group(['middleware'=>'auth'],function(){
	
	Route::get('/','PostsController@homepage')->name('homepage');
	Route::get('product','ProductsController@products')->name('products');
	Route::get('user-profile/{id}','UserController@editprofile')->name('user.editprofile');
	Route::post('user-profile/{id}','UserController@saveeditprofile');

Route::group(['middleware'=>'admin.check'],function(){
	////trang products
		
	//remove
		Route::get('product-remove/{id}','ProductsController@remove')->name('product.remove');
	//add product
		Route::get('add-product','ProductsController@addForm')->name('product.add');

		Route::post('add-product','ProductsController@saveAdd');
	//edit prodcut
		Route::get('product-edit/{id}','ProductsController@edit')->name('product.edit');
		Route::post('product-edit/{id}','ProductsController@saveedit');
	////category
		Route::get('category','CategoryController@categories')->name('categories');
	//remove
		Route::get('category-remove/{id}','CategoryController@remove')->name('category.remove');
	//add cate
		Route::get('add-category','CategoryController@addForm')->name('category.add');

		Route::post('add-category','CategoryController@saveAdd');
	//edit prodcut
		Route::get('category-edit/{id}','CategoryController@edit')->name('category.edit');
		Route::post('category-edit/{id}','CategoryController@saveedit');
	//index
	//remove post
		Route::get('post-remove/{id}','PostsController@remove')->name('post.remove');
	//add post
		Route::get('add', 'PostsController@addForm')->name('post.add');
		Route::post('add', 'PostsController@saveAdd');
	//edit post
		Route::get('post-edit/{id}','PostsController@edit')->name('post.edit');
		Route::post('post-edit/{id}','PostsController@saveedit');

	////end post
	//users
	//
		Route::get('user','UserController@users')->name('user');
	//add
		Route::get('add-user','UserController@add-users')->name('user.add');
		Route::post('add-user','UserController@saveAdd');
	//remove
		Route::get('user-remove/{id}','UserController@remove')->name('user.remove');
	//edit
		Route::get('user-edit/{id}','UserController@edit')->name('user.edit');
		Route::post('user-edit/{id}','UserController@saveedit');
	//// end uer
		

	});
});
?>