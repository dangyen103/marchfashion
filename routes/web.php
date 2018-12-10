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

	// $date = getdate();

	// $cur_year = $date['year'];
	// $cur_month = date('m', strtotime($date['month']));

	// echo $cur_month."<br>";
	// echo $cur_year;

    return view('test');
});

Route::post('test', 'Admin\ProductController@test');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Admin
Route::group(['prefix'=>'admin'], function(){

	//General
	Route::get('', 'Admin\ProductController@getProductList');

	Route::get('change-password','Admin\UserController@getAdminChangePassword');
	Route::post('change-password','Admin\UserController@postAdminChangePassword');

	//User
	Route::group(['prefix'=>'user'], function(){

		Route::get('','Admin\UserController@getUserList');
		Route::get("{id}/detail",'Admin\UserController@getUserDetail');

		Route::get('add','Admin\UserController@getAdminAdd');
		Route::post('add','Admin\UserController@postAdminAdd');

		Route::get("{id}/edit",'Admin\UserController@getAdminEdit');
		Route::post("{id}/edit",'Admin\UserController@postAdminEdit');

		Route::get("{id}/delete",'Admin\UserController@getAdminDelete');
	});


	//Product
	Route::group(['prefix'=>'product'], function(){

		Route::get('','Admin\ProductController@getProductList');
		Route::get('{id}/{name}', 'Admin\ProductController@getProductDetail');

		Route::get('add','Admin\ProductController@getProductAdd');
		Route::post('add','Admin\ProductController@postProductAdd');

		Route::get("{id}/{name}/edit",'Admin\ProductController@getProductEdit');
		Route::post("{id}/{name}/edit",'Admin\ProductController@postProductEdit');

		Route::get("{id}/{name}/delete",'Admin\ProductController@getProductDelete');
	});

	//Set
	Route::group(['prefix'=>'set'], function(){

		Route::get('','Admin\SetController@getSetList');
		Route::get('{id}/detail', 'Admin\SetController@getSetDetail');

		Route::get('add','Admin\SetController@getSetAdd');
		Route::post('add','Admin\SetController@postSetAdd');

		Route::get("{id}/edit",'Admin\SetController@getSetEdit');
		Route::post("{id}/edit",'Admin\SetController@postSetEdit');

		Route::get("{id}/delete",'Admin\SetController@getSetDelete');
	});

});
