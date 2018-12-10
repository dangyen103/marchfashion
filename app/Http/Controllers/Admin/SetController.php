<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Set;
use App\Product;

class SetController extends Controller
{
    public function __construct()
    {
        // $year = getdate()['year'];
        // $month = date('m', strtotime(getdate()['month']));

        // view()->share(compact('year', 'month'));
    }

    public function getSetList()
    {
        $sets = Set::all();
        return view('admin.set.set-list', compact('sets'));
    }

    public function getSetDetail($id)
    {
        $set = Set::find($id);
        return view('admin.set.set-detail', compact('set'));
    }

    public function getSetAdd()
    {
        $products = Product::all();
        return view('admin.set.set-add', compact('products'));
    }

    public function postSetAdd(Request $request)
    {
        $this->validate($request,
        [
            'description'=>'max:190',
            'products'=>'required'

        ],
        [
            'description.max' => 'Mô tả quá dài. Vui lòng nhập không quá 190 ký tự',
            'products.required' => 'Bạn chưa thêm sản phẩm',
        ]);

        $set = new Set;
        $set->description = $request->description;
        $set->save();

        foreach ($request->products as $product_id) {
            $product = Product::find($product_id);
            $product->sets()->attach($set->id);
        }

        return redirect("admin/set/add")->with('alert-success','Thêm set mới thành công!');
    }

    public function getSetEdit($id)
    {
        $products = Product::all();
        $set = Set::find($id);

        $set_product = array();

        foreach ($set->products as $key => $item) {
            $set_product[$key] = $item->id;
        }

        return view('admin.set.set-edit', compact('products', 'set', 'set_product'));
    }

    public function postSetEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'description'=>'max:190',
            'products'=>'required'

        ],
        [
            'description.max' => 'Mô tả quá dài. Vui lòng nhập không quá 190 ký tự',
            'products.required' => 'Bạn chưa thêm sản phẩm',
        ]);

        $set = Set::find($id);
        $set->description = $request->description;
        $set->save();

        //edit records in pivot table
        $set->products()->sync($request->products);

        return redirect("admin/set/$set->id/edit")->with('alert-success','Sửa thành công!');
    }

    public function getSetDelete($id)
    {
        $set = Set::find($id);
        $set->delete();

        return redirect("admin/set")->with('alert-success','Xóa thành công!');
    }
}
