<?php
Route::get('/greet', function() {
	return View::make('hello');
});

Route::get('/cat', array('before'=> 'authenticate',function() {

	return View::make('category');
}));

Route::get('/items',array('before'=> 'authenticate', function() {

	return View::make('items');
}));


Route::post('/cat', function() {
	//adding values to the database from the input fields

	$category = new Category;
	$category->cat_name = Input::get('cat_name');
	$category->description = Input::get('description');
	$category->image = time().'.jpeg';


	$data = Input::get('image_input');

	//decoding the image
	if($data){
		$imgstr = urldecode($data);
		$im = imagecreatefromjpeg($imgstr);
		imagejpeg($im, 'Uploads/graphics/categories/'.time().'.jpeg', 70);
		imagedestroy($im);
	}

	$saveFlag = $category->save();

	if($saveFlag) {
		return View::make('AllCategories');
	}
});

Route::post('/add', function() {
	//adding values to the database from the input fields
	$item = new Item;
	$item->item_name = Input::get('item_name');
	$item->cat_id = Input::get('category');
	$item->description = Input::get('description');
	$item->image = time().'.jpeg';

	$data = Input::get('image_input');

	//decoding the image
	if($data){
		$imgstr = urldecode($data);
		$im = imagecreatefromjpeg($imgstr);
		imagejpeg($im, 'Uploads/graphics/items/'.time().'.jpeg', 70);
		imagedestroy($im);
	}

	$saveFlag = $item->save();

	if($saveFlag) {
		return View::make('AllItems');
	}
});

Route::get('/images',array('before'=> 'authenticate','uses'=> 'ImageController@addShow'));

Route::post('/addImage', 'ImageController@add');


Route::post('/loadItem',function(){

	$cat_id = Input::get('cat_id');
	
	$items = Item::where('cat_id','=',$cat_id)->get();
	
	return Response::json($items);
});


Route::get('/getAllImages',array('before'=> 'authenticate','uses'=> 'ImageController@getAllImages'));

Route::get('/getImageData',array('before'=> 'authenticate','uses'=> 'ImageController@getImageData'));

Route::get('/viewImages',array('before'=> 'authenticate','uses'=> 'ImageController@viewAllImages'));

Route::post('/editImage','ImageController@edit');

Route::post('/update','ImageController@update');

Route::post('/deleteImage','ImageController@delete');

Route::get('/changePassword',array('before'=> 'authenticate',function(){
	return View::make('user')->with('message','');
}));


Route::post('/updatePassword','ImageController@updatePassword');

Route::get('viewCategories',array('before'=> 'authenticate','uses'=> 'CategoryController@getAllCategories'));

Route::resource('category','CategoryController');

Route::get('admin', function() {
	return View::make('layouts.main');
});

Route::get('viewItems',array('before'=> 'authenticate','uses'=> 'ItemController@getAllItems'));

Route::resource('item','ItemController');


Route::get('login', 'UserController@showLogin');

Route::post('doLogin','UserController@doLogin');




Route::post('/doLogout','UserController@logout');

Route::filter('authenticate',function(){
	if (!Auth::check())
	{
    	return View::make('user.login');
	}
	
});

