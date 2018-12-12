<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Discount;
use App\Product;

class DiscountController extends Controller
{
    public function getDiscountList()
    {
        $discounts = Discount::all();
        return view('admin.discount.discount-list', compact('discounts'));
    }

    public function getDiscountDetail($id)
    {
        $discount = Discount::find($id);
        return view('admin.discount.discount-detail', compact('discount'));
    }

    public function getDiscountAdd()
    {
        $products = Product::all();
        $cur_dateTime = Carbon::now();

        return view('admin.discount.discount-add', compact('products', 'cur_dateTime'));
    }

    public function postDiscountAdd(Request $request)
    {
        $this->validate($request,
        [
            'discountValue' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required',
            'description' => 'max:190',
            'products' => 'required'

        ],
        [
            'description.max' => 'Mô tả quá dài. Vui lòng nhập không quá 190 ký tự',
            'discountValue.required' => 'Bạn chưa nhập mức khuyến mại',
            'start_time.required' => 'Bạn chưa nhập thời gian bắt đầu',
            'finish_time.required' => 'Bạn chưa nhập thời gian kết thúc',
            'products.required' => 'Bạn chưa thêm sản phẩm',
        ]);

        $discount = new Discount;
        $discount->discountValue = $request->discountValue;
        $discount->start_time = $request->start_time;
        $discount->finish_time = $request->finish_time;
        $discount->description = $request->description;
     
        // Checck exists discount of product at the same time
        foreach ($request->products as $product_id)
        {
            $product = Product::find($product_id);

            foreach ($product->discounts as $prod_discount)
            {
               if($request->start_time <=  $prod_discount->finish_time 
                    || $request->finish_time >= $prod_discount->start_time)
                {
                    $product_error = str_pad($product->id, 8, '0', STR_PAD_LEFT);
                    return redirect('admin/discount/add')->with('alert-danger',"Sản phẩm mã $product_error đã có khuyến mại trong thời gian này.");
                }
            }
        }

        // Save
        $discount->save();

        foreach ($request->products as $product_id) {
            $product = Product::find($product_id);
            $product->discounts()->attach($discount->id);
        }

        return redirect("admin/discount/add")->with('alert-success','Thêm khuyến mại thành công!');
    }

    public function getDiscountEdit($id)
    {
        $products = Product::all();
        $discount = Discount::find($id);

        return view('admin.discount.discount-edit', compact('products', 'discount'));
    }

    public function postDiscountEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'discountValue' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required',
            'description' => 'max:190',
            'products' => 'required'

        ],
        [
            'description.max' => 'Mô tả quá dài. Vui lòng nhập không quá 190 ký tự',
            'discountValue.required' => 'Bạn chưa nhập mức khuyến mại',
            'start_time.required' => 'Bạn chưa nhập thời gian bắt đầu',
            'finish_time.required' => 'Bạn chưa nhập thời gian kết thúc',
            'products.required' => 'Bạn đã loại bỏ hết sản phẩm, cần ít nhất 1 sản phẩm áp dụng khuyến mại này',
        ]);

        $discount = Discount::find($id);
        $discount->discountValue = $request->discountValue;
        $discount->start_time = $request->start_time;
        $discount->finish_time = $request->finish_time;
        $discount->description = $request->description;

        // Checck exists discount of product at the same time
        foreach ($request->products as $product_id)
        {
            $product = Product::find($product_id);

            foreach ($product->discounts as $prod_discount)
            {
               if($request->start_time <=  $prod_discount->finish_time 
                    || $request->finish_time >= $prod_discount->start_time)
                {
                    $product_error = str_pad($product->id, 8, '0', STR_PAD_LEFT);
                    return redirect("admin/discount/$discount->id/edit")->with('alert-danger',"Sản phẩm mã $product_error đã có khuyến mại trong thời gian này.");
                }
            }
        }

        $discount->save();

        //edit records in pivot table
        $discount->products()->sync($request->products);

        return redirect("admin/discount/$discount->id/edit")->with('alert-success','Sửa thành công!');
    }

    public function getDiscountDelete($id)
    {
        $discount = Discount::find($id);
        $discount->delete();

        return redirect("admin/discount")->with('alert-success','Xóa thành công!');
    }
}
