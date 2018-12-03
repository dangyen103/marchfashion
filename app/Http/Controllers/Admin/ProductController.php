<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getProductList()
    {
        // $catelist = Cates::all();
        // $list = Products::orderBy('id','DESC')->paginate(5);
        // //$list = Products::paginate(5);
        return view('admin.product.product-list');
    }

    public function getProductAdd()
    {

    }

    public function postProductAdd(Request $request)
    {

    }

    public function getProductEdit($id)
    {
        
    }

    public function postProductEdit(Request $request, $id)
    {

    }

    public function getProductDelete($id)
    {

    }
}
