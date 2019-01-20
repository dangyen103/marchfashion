<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\ThemeSetting;
use App\Post;
use App\Category;
use App\City;
use App\District;
use App\User;
use App\Customer;
use Cart;

use Gmopx\LaravelOWM\LaravelOWM;

class PageController extends Controller
{
    public function __construct()
    {
        $web_theme = ThemeSetting::find(1);
        $web_contact_phones = explode("*", $web_theme->contact_phone);
        $web_shop_addresses = explode("*", $web_theme->shop_address);
        $web_home_banners = explode("*", $web_theme->home_banner);
        $web_prod_banners = explode("*", $web_theme->prod_banner);

        $categories = Category::all();

        if(Auth::check()){
            $current_user = Auth::user();
            view()->share(compact('web_theme', 'web_contact_phones', 'web_shop_addresses',
            'web_home_banners', 'web_prod_banners', 'categories', 'current_user'));
        }
        else {
            view()->share(compact('web_theme', 'web_contact_phones', 'web_shop_addresses',
                                'web_home_banners', 'web_prod_banners', 'categories'));
        }
    }

    public function getDangki()
    {
        $cities = City::all();
        return view('page.dangki',compact('cities'));
    }

    public function postDangki(Request $request)
    {
        if(empty($request->phone) == 0){
            $phone = $request->phone;
            if(strlen($phone) != 10){
                return redirect()->back()->with('alert-danger', 'Số điện thoại không đúng');
            }
        }
        
        $this->validate($request,
        [
            'name'=>'required|max:100',
            'email' => 'required|unique:users,email'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
            'name.max' => 'Tên quá dài. Vui lòng nhập không quá 100 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' =>'Email đã được sử dụng'
        ]);

        $user = new User;
        $customer = new Customer;


        if ($request->password == $request->confirm_password) {

            $this->validate($request,
            [
                'password' => 'min:8|max:190',
            ],
            [
                'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
                'password.max' => 'Mật khẩu quá dài. Vui lòng nhập không quá 190 kí tự'

            ]);
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->level = 0;
            $user->save();

            $customer->user_id = $user->id;
            if(empty($request->city) == 0){
                $city = City::find($request->city);
                $customer->city = $city->name;
            }
            $customer->district = $request->district;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->gender = $request->gender;
            $customer->birthday = $request->birthday;
            $customer->save();

            Auth::login($user);
        }
        else {
            return redirect()->back()->with('alert-danger', 'Xác nhận mật khẩu không trùng khớp');
        }

        return redirect('get-started');
    }

    public function getGetStarted(){
        return view('page.get-started');
    }

    public function postGetStarted(Request $request)
    {
        $user = Auth::user();
        $customer = $user->customer;

        $arr = array();
        array_push($arr, $request->answer1);
        array_push($arr, $request->answer2);
        array_push($arr, $request->answer3);
        array_push($arr, $request->answer4);
        array_push($arr, $request->answer5);

        $arr_count = array_count_values($arr);
        $max_value = max($arr_count);
        $max_key = array();

        foreach ($arr_count as $key => $value) {
            if($value == $max_value){
                array_push($max_key, $key);
            }
        }
        
        if(count($max_key) == 1){
            $check = $max_key[0];

            if($check == 'a'){
                $customer->fashion_style = 'Bohemian';
            }elseif ($check == 'b') {
                $customer->fashion_style = 'Preppy';
            }elseif ($check == 'c') {
                $customer->fashion_style = 'Surfer chic';
            }elseif ($check == 'd') {
                $customer->fashion_style = 'Fashionista';
            }elseif ($check == 'e') {
                $customer->fashion_style = 'Classic';
            }else {
                $customer->fashion_style = 'Suburbanite';
            }

            $customer->spend_money = $request->spend_money;
            $customer->save();

            return redirect('/');
        }
        else {
            $fashion_styles = array();
            foreach ($max_key as $item)
            {
                if($item == 'a'){
                    array_push($fashion_styles, 'Bohemian');
                }elseif ($item == 'b') {
                    array_push($fashion_styles, 'Preppy');
                }elseif ($item == 'c') {
                    array_push($fashion_styles, 'Surfer chic');
                }elseif ($item == 'd') {
                    array_push($fashion_styles, 'Fashionista');
                }elseif ($item == 'e') {
                    array_push($fashion_styles, 'Classic');
                }else {
                    array_push($fashion_styles, 'Suburbanite');
                }
            }
            $customer->spend_money = $request->spend_money;
            $customer->save();

            return view('page.choose-fashion-style', compact('fashion_styles'));
        }
    }

    public function postChooseFashionStyle(Request $request)
    {
        $customer = Auth::user()->customer;
        $customer->fashion_style = $request->fashion_style;
        $customer->save();
        return redirect('/');
    }

    public function getDangnhap()
    {
        return view('page.dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Bạn chưa nhập địa chỉ e-mail',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            if(Auth::user()->level == 0){
                return redirect('/');
            }
            else {
                return redirect('login')->with('alert-danger','Sai thông tin đăng nhập');
            }
        }
        else
        {
            return redirect('login')->with('alert-danger','Sai thông tin đăng nhập');
        }
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect('login');
    }

    public function test(){
        $lowm = new LaravelOWM();
        $city_name = "Hà Nội";
        $city = City::where('name', $city_name)->first();
        $city_location = explode("-", $city->location);
        $current_weather = $lowm->getCurrentWeather(array('lat' => $city_location[0], 'lon' => $city_location[1]));

        echo $current_weather->temperature->now->getValue();
        // echo $city;

        return view('test');
    }
    
    public function trangchu(){

        $new_products = Product::where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")))
                                    ->orderBy('id', 'desc')->get();

        $feature_products = Product::inRandomOrder()->take(10)->get();

        $posts = Post::orderBy('id','desc')->take(4)->get();

        // check current user
        if(Auth::check())
        {
            $user = Auth::user();

            //check exist customer city
            if(empty($user->customer->city) == 0)
            {
                $lowm = new LaravelOWM();

                $city = City::where('name', $user->customer->city)->first();
                $city_location = explode("-", $city->location);
                $current_weather = $lowm->getCurrentWeather(array('lat' => $city_location[0], 'lon' => $city_location[1]));
                $current_temp = $current_weather->temperature->now->getValue();

                //temp label 
                $temp_label = 'Nóng';
                if ($current_temp < 22) {
                    $temp_label = 'Lạnh';
                } elseif($current_temp < 27 ) {
                    $temp_label = 'Mát mẻ';
                }

                //filter product matching to temp label
                $new_products = '';
                $feature_products = '';
                $new_products = Product::where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")))
                                        ->where('label','like', "%$temp_label%")
                                        ->orderBy('id', 'desc')->get();
                $feature_products = Product::where('label','like', "%$temp_label%")
                                    ->inRandomOrder()->take(10)->get();

                //check exist customer style
                if (empty($user->customer->fashion_style) == 0) 
                {
                    $user_style = $user->customer->fashion_style;
                    
                    //Check exist customer spend money
                    if (empty($user->customer->spend_money) == 0) 
                    {
                        $suggested_products;

                        if ($user->customer->spend_money == 'low') 
                        {
                            $suggested_products = Product::where('label','like', "%$temp_label%")
                                                        ->where('label','like',"%$user_style%")
                                                        ->where('price','<',500000)
                                                        ->get();
                        }
                        elseif ($user->customer->spend_money == 'medium') 
                        {
                            $suggested_products = Product::where('label','like', "%$temp_label%")
                                                        ->where('label','like',"%$user_style%")
                                                        ->where('price','<=',1000000)
                                                        ->get();
                        }
                        else 
                        {
                            $suggested_products = Product::where('label','like', "%$temp_label%")
                                                        ->where('label','like',"%$user_style%")
                                                        ->get();
                        }

                        return view('page.trangchu', compact('new_products', 'feature_products', 'posts', 'suggested_products'));
                    } // not existed data of spend money
                    else 
                    {
                        $suggested_products = Product::where('label','like', "%$temp_label%")
                                                        ->where('label','like',"%$user_style%")
                                                        ->get();

                        return view('page.trangchu', compact('new_products', 'feature_products', 'posts', 'suggested_products'));
                    }
                    
                } // not existed data of fashion style
                else 
                {
                    $suggested_products = Product::where('label','like', "%$temp_label%")->get();
                    return view('page.trangchu', compact('new_products', 'feature_products', 'posts', 'suggested_products'));
                }
                
            } // not existed data of city
            else 
            {
                return view('page.trangchu', compact('new_products', 'feature_products', 'posts'));
            }
        }
        return view('page.trangchu', compact('new_products', 'feature_products', 'posts'));
    }

    public function getSuggestionForYou()
    {
        $user = Auth::user();
        
        $products;
        
        $lowm = new LaravelOWM();

        $city = City::where('name', $user->customer->city)->first();
        $city_location = explode("-", $city->location);
        $current_weather = $lowm->getCurrentWeather(array('lat' => $city_location[0], 'lon' => $city_location[1]));
        $current_temp = $current_weather->temperature->now->getValue();

        //temp label 
        $temp_label = 'Nóng';
        if ($current_temp < 22) {
            $temp_label = 'Lạnh';
        } elseif($current_temp < 27 ) {
            $temp_label = 'Mát mẻ';
        }

        //check exist customer style
        if (empty($user->customer->fashion_style) == 0) 
        {
            $user_style = $user->customer->fashion_style;
            
            //Check exist customer spend money
            if (empty($user->customer->spend_money) == 0) 
            {
                if ($user->customer->spend_money == 'low') 
                {
                    $products = Product::where('label','like', "%$temp_label%")
                                                ->where('label','like',"%$user_style%")
                                                ->where('price','<',500000)
                                                ->get();
                }
                elseif ($user->customer->spend_money == 'medium') 
                {
                    $products = Product::where('label','like', "%$temp_label%")
                                                ->where('label','like',"%$user_style%")
                                                ->where('price','<=',1000000)
                                                ->get();
                }
                else 
                {
                    $products = Product::where('label','like', "%$temp_label%")
                                                ->where('label','like',"%$user_style%")
                                                ->get();
                }

                return view('page.goiychoban', compact('products'));
            } // not existed data of spend money
            else 
            {
                $products = Product::where('label','like', "%$temp_label%")
                                    ->where('label','like',"%$user_style%")
                                    ->get();
                return view('page.goiychoban', compact('products'));
            }
            
        } // not existed data of fashion style
        else 
        {
            $products = Product::where('label','like', "%$temp_label%")->get();
            return view('page.goiychoban', compact('products'));
        }
    }

    public function sanpham()
    {
        $products = Product::orderBy('id', 'desc')->paginate(12);

        $new_products = Product::where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
                                ->orderBy('id', 'desc')->paginate(12);
        $feature_products = Product::inRandomOrder()->paginate(12);

        $price_desc_products = Product::orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::orderBy('price', 'asc')->paginate(12);
        
        return view('page.sanpham', compact('products', 'new_products', 'feature_products', 
                                            'price_desc_products', 'price_asc_products'));
    }

    public function sanphamAo(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 0);
        })->orderBy('id', 'desc')->paginate(12);

        $new_products =  Product::whereHas('category', function ($query) {
            $query->where('type', 0);
        })->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
            ->orderBy('id', 'desc')->paginate(12);

        $feature_products = $products = Product::whereHas('category', function ($query) {
            $query->where('type', 0);
        })->inRandomOrder()->paginate(12);

        $price_desc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 0);
        })->orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 0);
        })->orderBy('price', 'asc')->paginate(12);
        
        $type = 'Áo';

        return view('page.sanpham', compact('products', 'type', 'new_products', 'feature_products', 
                                            'price_desc_products', 'price_asc_products'));
    }

    public function sanphamQuan(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->orderBy('id', 'desc')->paginate(12);

        $new_products =  Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
            ->orderBy('id', 'desc')->paginate(12);

        $feature_products = $products = Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->inRandomOrder()->paginate(12);

        $price_desc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->orderBy('price', 'asc')->paginate(12);

        $type = 'Quần';

        return view('page.sanpham', compact('products', 'type', 'new_products', 'feature_products', 
                                            'price_desc_products', 'price_asc_products'));
    }

    public function sanphamVay(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->inRandomOrder()->paginate(12);

        $new_products =  Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
            ->orderBy('id', 'desc')->paginate(12);

        $feature_products = Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->orderBy('id', 'desc')->paginate(12);

        $price_desc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->orderBy('price', 'asc')->paginate(12);

        $type = 'Váy';

        return view('page.sanpham', compact('products', 'type', 'new_products', 'feature_products', 
                                            'price_desc_products', 'price_asc_products'));
    }

    public function sanphamBo(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 3);
        })->orderBy('id', 'desc')->paginate(12);

        $new_products =  Product::whereHas('category', function ($query) {
            $query->where('type', 3);
        })->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
            ->orderBy('id', 'desc')->paginate(12);

        $feature_products = Product::whereHas('category', function ($query) {
            $query->where('type', 3);
        })->inRandomOrder()->paginate(12);

        $price_desc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 3);
        })->orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 3);
        })->orderBy('price', 'asc')->paginate(12);

        $type = 'Bộ';

        return view('page.sanpham', compact('products', 'type', 'new_products', 'feature_products', 
                                            'price_desc_products', 'price_asc_products'));
    }

    public function sanphamPhukien(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 4);
        })->orderBy('id', 'desc')->paginate(12);

        $new_products =  Product::whereHas('category', function ($query) {
            $query->where('type', 4);
        })->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
            ->orderBy('id', 'desc')->paginate(12);

        $feature_products = Product::whereHas('category', function ($query) {
            $query->where('type', 4);
        })->inRandomOrder()->paginate(12);

        $price_desc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 4);
        })->orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::whereHas('category', function ($query) {
            $query->where('type', 4);
        })->orderBy('price', 'asc')->paginate(12);

        $type = 'Phụ kiện';

        return view('page.sanpham', compact('products' ,'type', 'new_products', 'feature_products', 
                                            'price_desc_products', 'price_asc_products'));
    }

    public function sanphamLoai($id)
    {
        $category = Category::find($id);
        $type;
        $unsigned_type;
        $sub_type = $category->name;

        if($category->type == 0){
            $type = 'Áo'; 
            $unsigned_type = 'ao';
        } elseif ($category->type == 1) {
            $type = 'Quần';
            $unsigned_type = 'quan';
        } elseif ($category->type == 2) {
            $type = 'Váy';
            $unsigned_type = 'vay';
        } elseif ($category->type == 3) {
            $type = 'Bộ';
            $unsigned_type = 'bo';
        } else {
            $type = 'Phụ kiện';
            $unsigned_type = 'phu-kien';
        }

        $products = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(12);

        $new_products =  Product::where('category_id', $id)
                                ->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
                                ->orderBy('id', 'desc')->paginate(12);

        $feature_products = Product::where('category_id', $id)->inRandomOrder()->paginate(12);

        $price_desc_products = Product::where('category_id', $id)->orderBy('price', 'desc')->paginate(12);
        
        $price_asc_products = Product::where('category_id', $id)->orderBy('price', 'asc')->paginate(12);

        return view('page.sanpham', compact('type', 'unsigned_type', 'sub_type', 'products', 'new_products', 
                                            'feature_products', 'price_desc_products', 'price_asc_products'));
    }

    public function sanphamchitiet($id){

        $product = Product::find($id);

        return view('page.sanphamchitiet', compact('product'));
    }

    public function gioiThieu(){
        return view('page.gioithieu');
    }

    public function tuyenDung(){
        return view('page.tuyendung');
    }

    public function cacCuaHang(){
        return view('page.caccuahang');
    }

    public function lienHe(){
        return view('page.lienhe');
    }

    public function xuhuong(){
        $posts = Post::orderBy('id', 'DESC')->paginate(8);
        return view('page.xuhuong', compact('posts'));
    }

    public function xuhuongchitiet($id){
        $post = Post::find($id);
        $other_posts = Post::where('id', '<>', $id)->inRandomOrder()->take(4)->get();
        return view('page.xuhuongchitiet', compact('post', 'other_posts'));
    }

    public function giohang()
    {
        $cities = City::all();
        
        $cart_products = Cart::content();
        return view('page.giohang', compact('cart_products', 'cities'));
    }

    public function taikhoan(){
        return view('page.taikhoan');
    }

    public function getTaiKhoanEdit(){
        return view('page.taikhoanedit');
    }

    public function postTaiKhoanEdit(Request $request)
    {
        if(empty($request->phone) == 0){
            $phone = $request->phone;
            if(strlen($phone) != 10){
                return redirect()->back()->with('alert-danger', 'Số điện thoại không đúng');
            }
        }

        $customer = Auth::user()->customer;
        $customer->city = $request->city;
        $customer->district = $request->district;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->birthday = $request->birthday;
        $customer->save();

        return redirect('tai-khoan/chinh-sua')->with('alert-success', 'Đã lưu chỉnh sửa');
    }

    public function donhang()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->customer->id)->orderBy('id', 'desc')->get();

        return view('page.donhang', compact('orders'));
    }

    public function donhangchitiet($id){
        $order = Order::find($id);
        return view('page.donhangchitiet', compact('order'));
    }
    
}
