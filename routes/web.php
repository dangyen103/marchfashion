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

	Route::get('login', 'Admin\UserController@getAdminLogin');
	Route::get('logout', 'Admin\UserController@getAdminLogout');

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

	//Order
	Route::group(['prefix'=>'order'], function(){

		Route::get('','Admin\OrderController@getOrderList');
		Route::get('confirm','Admin\OrderController@getConfirmList');
		Route::get('packing','Admin\OrderController@getPackingList');
		Route::get('shipping','Admin\OrderController@getShippingList');
		Route::get('completed','Admin\OrderController@getCompletedList');
		
		Route::get('{id}','Admin\OrderController@getOrderDetail');

		Route::get('{id}/cancel','Admin\OrderController@getOrderCancle');
		Route::get('{id}/cancel-undo','Admin\OrderController@getOrderCancleUndo');
		Route::get('{id}/change-status','Admin\OrderController@getOrderChangeStatus');
	});


	//Discount
	Route::group(['prefix'=>'discount'], function(){

		Route::get('','Admin\DiscountController@getDiscountList');
		Route::get('{id}/detail', 'Admin\DiscountController@getDiscountDetail');

		Route::get('add','Admin\DiscountController@getDiscountAdd');
		Route::post('add','Admin\DiscountController@postDiscountAdd');

		Route::get("{id}/edit",'Admin\DiscountController@getDiscountEdit');
		Route::post("{id}/edit",'Admin\DiscountController@postDiscountEdit');

		Route::get("{id}/delete",'Admin\DiscountController@getDiscountDelete');
	});

	//Post
	Route::group(['prefix'=>'post'], function(){

		Route::get('','Admin\PostController@getPostList');
		Route::get('{id}/detail', 'Admin\PostController@getPostDetail');

		Route::get('add','Admin\PostController@getPostAdd');
		Route::post('add','Admin\PostController@postPostAdd');

		Route::get("{id}/{unsigned_title}/edit",'Admin\PostController@getPostEdit');
		Route::post("{id}/{unsigned_title}/edit",'Admin\PostController@postPostEdit');

		Route::get("{id}/delete",'Admin\PostController@getPostDelete');
	});

	//Category
	Route::group(['prefix'=>'category'], function(){

		Route::get('','Admin\CategoryController@getCategoryList');

		Route::get('add','Admin\CategoryController@getCategoryAdd');
		Route::post('add','Admin\CategoryController@postCategoryAdd');

		Route::get("{id}/edit",'Admin\CategoryController@getCategoryEdit');
		Route::post("{id}/edit",'Admin\CategoryController@postCategoryEdit');

		Route::get("{id}/delete",'Admin\CategoryController@getCategoryDelete');
	});

});


// Website

Route::get('/', 'PageController@trangchu')->name('trangchu');

Route::get('san-pham', 'PageController@sanpham');
Route::get('ao', 'PageController@sanphamAo');
Route::get('quan', 'PageController@sanphamQuan');
Route::get('vay', 'PageController@sanphamVay');
Route::get('bo', 'PageController@sanphamBo');
Route::get('phu-kien', 'PageController@sanphamPhukien');

Route::get("sanpham/{id}/{unsigned_name}", 'PageController@sanphamchitiet');

Route::get('vechungtoi', 'PageController@vechungtoi');

Route::get('xuhuong', 'PageController@xuhuong');

Route::get('xuhuongchitiet', 'PageController@xuhuongchitiet');

Route::get('giohang', 'PageController@giohang');

Route::get('taikhoan', 'PageController@taikhoan');

Route::get('taikhoanedit', 'PageController@taikhoanedit');

Route::get('donhang', 'PageController@donhang');

Route::get('donhangchitiet', 'PageController@donhangchitiet');
