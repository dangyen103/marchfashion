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
        return view('page.sanpham');
    }

    public function sanphamchitiet(){
        return view('page.sanphamchitiet');
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
