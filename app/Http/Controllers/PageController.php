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
        return view('page.dangnhap');
    }

    public function postDangki(Request $request)
    {
        
    }

    public function getGetStarted(){
        return view('page.get-started');
    }

    public function postGetStarted(Request $request){
        return view('page.get-started');
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

        $feature_products = Product::take(10)->get();

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
                $feature_products = Product::take(10)->where('label','like', "%$temp_label%")->get();

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
        $products = Product::inRandomOrder()->get();
        return view('page.goiychoban', compact('products'));
    }

    public function sanpham()
    {
        $products = Product::orderBy('id', 'desc')->paginate(12);

        $new_products = Product::where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
                                ->orderBy('id', 'desc')->paginate(12);
        $feature_products = $products;

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

        $feature_products = $products;

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

        $feature_products = $products;

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
        })->orderBy('id', 'desc')->paginate(12);

        $new_products =  Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->where('created_at', '>', strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")))
            ->orderBy('id', 'desc')->paginate(12);

        $feature_products = $products;

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

        $feature_products = $products;

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

        $feature_products = $products;

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

    public function giohang(){
        return view('page.giohang');
    }

    public function taikhoan(){
        return view('page.taikhoan');
    }

    public function taikhoanedit(){
        return view('page.taikhoanedit');
    }

    public function donhang(){
        return view('page.donhang');
    }

    public function donhangchitiet(){
        return view('page.donhangchitiet');
    }
    
}
