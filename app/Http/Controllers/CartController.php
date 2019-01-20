<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\OrderStatusMail;
use App\Product;
use App\ProductDetail;
use App\Order;
use Cart;
use Mail;

class CartController extends Controller
{
    public function __construct()
    {
        
    }

    public function getCartCount()
    {
        $cart_count = Cart::count();
        return $cart_count;
    }

    public function cartDestroy()
    {
        Cart::destroy();
    }

    public function themVaoGio(Request $request, $id)
    {
        $product_detail = ProductDetail::where('product_id', $id)
                                            ->where('color', $request->color)
                                            ->where('size', $request->size)
                                            ->first();
        $discount = 0;
        foreach ($product_detail->product->discounts as $prod_discount) {
            if (date('Y-m-d H:i:s', strtotime($prod_discount->start_time)) <= date('Y-m-d H:i:s')
            && date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($prod_discount->finish_time))){;
                $discount = $prod_discount->discountValue; 
                break;
            }
        }
        Cart::add($product_detail->id, $product_detail->product->name, 
                    $request->quantity ,$product_detail->product->price,
                    [
                        'color' => $product_detail->color,
                        'size' => $product_detail->size,
                        'image' => $product_detail->product->thumbnail,
                        'discount' => $discount,
                        'product_id' => $product_detail->product->id,
                        'product_unsigned_name' => $product_detail->product->unsigned_name
                    ]
                );

        return redirect('gio-hang');
    }

    public function datHang(Request $request)
    {
        $user =  Auth::user();

        $sub_total = 0;
        foreach (Cart::content() as $item) {
            $sub_total = $sub_total + ($item->price*(100-$item->options->discount)/100);
        }

        $order = new Order;
        $order->customer_id = $user->customer->id;
        $order->receiver_name = $request->receiver_name;
        $order->receiver_city = $request->receiver_city;
        $order->receiver_district = $request->receiver_district;
        $order->receiver_address = $request->receiver_address;
        $order->receiver_phone = $request->receiver_phone;
        $order->status = 0;
        $order->payment_type = 0;

        if($request->receiver_city == "Hà Nội" || $sub_total >= 500000){
            $order->shipping_price = 0;
        }else {
            $order->shipping_price = 35000;
        }

        $order->total = $sub_total + $order->shipping_price;
        $order->save();

        //attach records in pivot table
        foreach (Cart::content() as $cart_item) {
            $product_detail = ProductDetail::find($cart_item->id);
            $product_detail->orders()->attach($order->id, [
                'order_quantity' => $cart_item->qty,
                'order_discount' => $cart_item->options->discount

            ]);
        }

        Cart::destroy();

        //send email
        $email = new OrderStatusMail($order);
        Mail::to($order->customer->user->email)->send($email);

        return redirect("don-hang/$order->id/chi-tiet");

    }

    public function xoaGioHang($rowId)
    {
        Cart::remove($rowId);
        return redirect('gio-hang');
    }
}
