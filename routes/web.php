<?php

use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {

    // $dist = array("Đông Anh","Cầu Giấy","Hoàng Mai","Ba Đình","Thanh Xuân");

    // echo $dist[array_rand($dist, 1)];

    // $u = User::where('level', 0)->inRandomOrder();
    
    return view('mails.admin-password');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Admin
Route::group(['prefix'=>'admin'], function(){

	Route::get('', 'Admin\ProductController@getProductList');

	Route::get('change-password','Admin\UserController@getAdminChangePassword');
	Route::post('change-password','Admin\UserController@postAdminChangePassword');

	Route::group(['prefix'=>'user'], function(){

		Route::get('','Admin\UserController@getUserList');
		Route::get("customer-detail/{id}",'Admin\UserController@getUserDetail');

		Route::get('add','Admin\UserController@getAdminAdd');
		Route::post('add','Admin\UserController@postAdminAdd');

		Route::get("edit/{id}",'Admin\UserController@getAdminEdit');
		Route::post("edit/{id}",'Admin\UserController@postAdminEdit');

		Route::get("delete/{id}",'Admin\UserController@getAdminDelete');
	});

	Route::group(['prefix'=>'product'], function(){

		Route::get('','Admin\ProductController@getProductList');

		Route::get('add','Admin\ProductController@getProductAdd');
		Route::post('add','Admin\ProductController@postProductAdd');

		Route::get("edit/{id}",'Admin\ProductController@getProductEdit');
		Route::post("edit/{id}",'Admin\ProductController@postProductEdit');

		Route::get("delete/{id}",'Admin\ProductController@getProductDelete');
	});


});
