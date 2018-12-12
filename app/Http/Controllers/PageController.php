<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function trangchu(){
        return view('page.trangchu');
    }

    public function sanpham(){
        $products = Product::all();
        return view('page.sanpham', compact('products'));
    }

    public function sanphamAo(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 0);
        })->get();

        $type = 'Áo';

        return view('page.sanpham', compact('products', 'type'));
    }

    public function sanphamQuan(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->get();

        $type = 'Quần';

        return view('page.sanpham', compact('products', 'type'));
    }

    public function sanphamVay(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 2);
        })->get();

        $type = 'Váy';

        return view('page.sanpham', compact('products', 'type'));
    }

    public function sanphamBo(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 3);
        })->get();

        $type = 'Bộ';

        return view('page.sanpham', compact('products', 'type'));
    }

    public function sanphamPhukien(){
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 4);
        })->get();

        $type = 'Phụ kiện';

        return view('page.sanpham', compact('products' ,'type'));
    }

    public function sanphamchitiet($id){

        $product = Product::find($id);

        return view('page.sanphamchitiet', compact('product'));
    }

    public function vechungtoi(){
        return view('page.vechungtoi');
    }

    public function xuhuong(){
        return view('page.xuhuong');
    }

    public function xuhuongchitiet(){
        return view('page.xuhuongchitiet');
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
