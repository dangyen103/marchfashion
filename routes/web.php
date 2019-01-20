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

// Route::get('test', function () {

//     $week = strtotime(date("Y-m-d") . " +1 week");
// 	$week = strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week"));
// 	echo "A week later is ". $week;
//     return view('test');
// });

Route::get('test', 'PageController@test');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin Login
Route::get('admin/login', 'Admin\UserController@getAdminLogin');
Route::post('admin/login', 'Admin\UserController@postAdminLogin');

//Admin logout
Route::get('admin/logout', 'Admin\UserController@getAdminLogout');


//Admin
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'], function(){

	// //General
	Route::get('', 'Admin\UserController@getAdmin');

	Route::get('theme-setting','Admin\UserController@getThemeSetting')->middleware('can:adminitrator');
	Route::post('theme-setting','Admin\UserController@postThemeSetting')->middleware('can:adminitrator');

	Route::get('change-password','Admin\UserController@getAdminChangePassword');
	Route::post('change-password','Admin\UserController@postAdminChangePassword');

	//User
	Route::group(['prefix'=>'user', 'middleware'=>'can:user-manager'], function(){

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
	Route::group(['prefix'=>'set', 'middleware'=>'can:set-manager'], function(){

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
		// Route::get('{id}/edit','Admin\OrderController@getOrderEdit');

		Route::get('{id}/cancel','Admin\OrderController@getOrderCancle');
		Route::get('{id}/cancel-confirm','Admin\OrderController@getOrderCancleConfirm');
		Route::get('{id}/cancel-undo','Admin\OrderController@getOrderCancleUndo');
		Route::get('{id}/change-status','Admin\OrderController@getOrderChangeStatus');
	});


	//Discount
	Route::group(['prefix'=>'discount', 'middleware'=>'can:disc-manager'], function(){

		Route::get('','Admin\DiscountController@getDiscountList');
		Route::get('{id}/detail', 'Admin\DiscountController@getDiscountDetail');

		Route::get('add','Admin\DiscountController@getDiscountAdd');
		Route::post('add','Admin\DiscountController@postDiscountAdd');

		Route::get("{id}/edit",'Admin\DiscountController@getDiscountEdit');
		Route::post("{id}/edit",'Admin\DiscountController@postDiscountEdit');

		Route::get("{id}/delete",'Admin\DiscountController@getDiscountDelete');
	});

	//Post
	Route::group(['prefix'=>'post', 'middleware'=>'can:post-manager'], function(){

		Route::get('','Admin\PostController@getPostList');
		Route::get('{id}/detail', 'Admin\PostController@getPostDetail');

		Route::get('add','Admin\PostController@getPostAdd');
		Route::post('add','Admin\PostController@postPostAdd');

		Route::get("{id}/{unsigned_title}/edit",'Admin\PostController@getPostEdit');
		Route::post("{id}/{unsigned_title}/edit",'Admin\PostController@postPostEdit');

		Route::get("{id}/delete",'Admin\PostController@getPostDelete');
	});

	//Category
	Route::group(['prefix'=>'category', 'middleware'=>'can:adminitrator'], function(){

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

//Login and Logout
Route::get('login', 'PageController@getDangnhap');
Route::post('login', 'PageController@postDangnhap');
Route::get('logout', 'PageController@dangxuat');

//Sign in
Route::get('signin', 'PageController@getDangki');
Route::post('signin', 'PageController@postDangki');

//Get started
Route::get('get-started', 'PageController@getGetStarted');
Route::post('get-started', 'PageController@postGetStarted');
Route::post('get-started/choose-fashion-style', 'PageController@postChooseFashionStyle');

//Goi y cho ban
Route::get('goi-y-cho-ban', 'PageController@getSuggestionForYou');

//San pham
Route::get('san-pham', 'PageController@sanpham');
Route::get('ao', 'PageController@sanphamAo');
Route::get('quan', 'PageController@sanphamQuan');
Route::get('vay', 'PageController@sanphamVay');
Route::get('bo', 'PageController@sanphamBo');
Route::get('phu-kien', 'PageController@sanphamPhukien');

//San pham theo loai con
Route::get("ao/{id}/{unsigned_name}", 'PageController@sanphamLoai');
Route::get("quan/{id}/{unsigned_name}", 'PageController@sanphamLoai');
Route::get("vay/{id}/{unsigned_name}", 'PageController@sanphamLoai');
Route::get("bo/{id}/{unsigned_name}", 'PageController@sanphamLoai');
Route::get("phu-kien/{id}/{unsigned_name}", 'PageController@sanphamLoai');

//San pham chi tiet
Route::get("san-pham/{id}/{unsigned_name}", 'PageController@sanphamchitiet');

//Ve chung toi
Route::get('gioi-thieu', 'PageController@gioiThieu');
Route::get('tuyen-dung', 'PageController@tuyenDung');
Route::get('cac-cua-hang', 'PageController@cacCuaHang');
Route::get('lien-he', 'PageController@lienHe');

//Xu huong
Route::get('xu-huong', 'PageController@xuhuong');
Route::get("xu-huong/{id}/{unsigned_title}", 'PageController@xuhuongchitiet');

//Tai khoan, gio hang va thanh toan
Route::get('gio-hang', 'PageController@giohang')->middleware('customerlogin');
Route::get("san-pham/{id}/{unsigned_name}/them-vao-gio", 'CartController@themVaoGio')->middleware('customerlogin');
Route::get('dat-hang', 'CartController@datHang')->middleware('customerlogin');
Route::get("gio-hang/{rowId}/xoa", 'CartController@xoaGioHang')->middleware('customerlogin');


Route::get("tai-khoan", 'PageController@taikhoan')->middleware('customerlogin');

Route::get("tai-khoan/chinh-sua", 'PageController@getTaiKhoanEdit')->middleware('customerlogin');
Route::post("tai-khoan/chinh-sua", 'PageController@postTaiKhoanEdit')->middleware('customerlogin');

Route::get("don-hang", 'PageController@donhang')->middleware('customerlogin');

Route::get("don-hang/{order_id}/chi-tiet", 'PageController@donhangchitiet')->middleware('customerlogin');

Route::get('showDistrictsInCity', 'DistrictController@showDistrictsInCity');
