<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function getOrderList()
    {
        $orders = Order::orderBy('id','DESC')->get();
        $status = "Tất cả";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getConfirmList()
    {
        $orders = Order::where('status', 0)->orderBy('id','DESC')->get();
        $status = "Chờ xác nhận";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getPackingList()
    {
        $orders = Order::where('status', 1)->orderBy('id','DESC')->get();
        $status = "Đang đóng gói";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getShippingList()
    {
        $orders = Order::where('status', 2)->orderBy('id','DESC')->get();
        $status = "Đang vận chuyển";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getCompletedList()
    {
        $orders = Order::where('status', 3)->orderBy('id','DESC')->get();
        $status = "Đã giao hàng";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getOrderDetail($id)
    {
        $order = Order::find($id);
        $order_action = "Xác nhận";

        if($order->status == 1)
        { 
            $order_action = "Hoàn tất đóng gói";
        }
        else if($order->status == 2)
        { 
            $order_action = "Đã giao hàng";
        }

        return view('admin.order.order-detail', compact('order', 'order_action'));
    }

    public function getOrderCancle($id)
    {
        $order = Order::find($id);
        if($order->cancel_status == 0){
            $order->cancel_status = 1;
            $order->save();
        }
        return redirect("admin/order/$order->id")->with('alert-danger','Đơn hàng này đã bị hủy!');
    }

    public function getOrderCancleUndo($id)
    {
        $order = Order::find($id);
        if($order->cancel_status == 1){
            $order->cancel_status = 0;
            $order->save();
        }
        return redirect("admin/order/$order->id");
    }

    public function getOrderChangeStatus($id)
    {
        $order = Order::find($id);
        if($order->status == 0){
            $order->status = 1;
            $order->save();
            return redirect("admin/order/$order->id")->with('alert-success','Đơn hàng đã chuyển sang đang đóng gói!');
        }
        elseif ($order->status == 1) {
            $order->status = 2;
            $order->save();
            return redirect("admin/order/$order->id")->with('alert-success','Đơn hàng đã chuyển sang đang vận chuyển!');
        }
        elseif ($order->status == 2) {
            $order->status = 3;
            $order->save();
            return redirect("admin/order/$order->id")->with('alert-success','Đơn hàng đã giao thành công!');
        }
    }
}
