<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Mail\OrderStatusMail;
use Gate;
use Mail;

class OrderController extends Controller
{
    public function getOrderList()
    {
        $this->authorize('order-manager');

        $orders = Order::orderBy('id','DESC')->get();
        $status = "Tất cả";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getConfirmList()
    {
        if (Gate::check('order-manager') || Gate::check('confirmOrder'))
        {
            $orders = Order::where('status', 0)->orderBy('id','DESC')->get();
            $status = "Chờ xác nhận";

            return view('admin.order.order-list', compact('orders', 'status'));
        }
        else {
            abort(403);
        }
    }

    public function getPackingList()
    {
        if (Gate::check('order-manager') || Gate::check('packingOrder'))
        {
            $orders = Order::where('status', 1)->orderBy('id','DESC')->get();
            $status = "Đang đóng gói";

            return view('admin.order.order-list', compact('orders', 'status'));
        }
        else {
            abort(403);
        }
    }

    public function getShippingList()
    {
        if (Gate::check('order-manager') || Gate::check('shippingOrder'))
        {
            $orders = Order::where('status', 2)->orderBy('id','DESC')->get();
            $status = "Đang vận chuyển";

            return view('admin.order.order-list', compact('orders', 'status'));
        }
        else {
            abort(403);
        }
    }

    public function getCompletedList()
    {
        $this->authorize('order-manager');

        $orders = Order::where('status', 3)->orderBy('id','DESC')->get();
        $status = "Đã giao hàng";

        return view('admin.order.order-list', compact('orders', 'status'));
    }

    public function getOrderDetail($id)
    {
        if (Gate::check('order-manager') || Gate::check('confirmOrder') ||
            Gate::check('packingOrder') || Gate::check('shippingOrder'))
        {
            $order = Order::find($id);
            return view('admin.order.order-detail', compact('order'));
        } else {
            abort(403);
        }
    }

    public function getOrderEdit($id)
    {
        $order = Order::find($id);
        return view('admin.order.order-edit', compact('order'));
    }

    public function getOrderCancle($id)
    {
        if (Gate::check('order-manager') || Gate::check('confirmOrder') ||
            Gate::check('packingOrder') || Gate::check('shippingOrder'))
        {
            $order = Order::find($id);
            if($order->cancel_status == 0){
                $order->cancel_status = 1;
                $order->save();
            }
            return redirect("admin/order/$order->id")->with('alert-danger','Đơn hàng này sẽ bị hủy!');
        } else {
            abort(403);
        }
    }

    public function getOrderCancleConfirm($id)
    {
        if (Gate::check('order-manager') || Gate::check('confirmOrder') ||
        Gate::check('packingOrder') || Gate::check('shippingOrder'))
        { 
            $order = Order::find($id);

            //send email
            $email = new OrderStatusMail($order);
            Mail::to($order->customer->user->email)->send($email);

            return redirect("admin/order/$order->id")->with('alert-success','Đẫ hủy đơn hàng!');
        } else {
            abort(403);
        }
    }

    public function getOrderCancleUndo($id)
    {
        if (Gate::check('order-manager') || Gate::check('confirmOrder') ||
        Gate::check('packingOrder') || Gate::check('shippingOrder'))
        {
            $order = Order::find($id);
            if($order->cancel_status == 1){
                $order->cancel_status = 0;
                $order->save();
            }
            return redirect("admin/order/$order->id");
        } else {
            abort(403);
        }
    }

    public function getOrderChangeStatus($id)
    {
        $order = Order::find($id);
        if ($order->cancel_status == 0) {
            if($order->status == 0){
                if (Gate::check('order-manager') || Gate::check('confirmOrder'))
                {
                    $order->status = 1;
                    $order->save();
        
                    //send email
                    $email = new OrderStatusMail($order);
                    Mail::to($order->customer->user->email)->send($email);
        
                    return redirect("admin/order/$order->id")->with('alert-success','Đơn hàng đã chuyển sang đang đóng gói!');
                }
                else {
                    abort(403);
                }
            }
            elseif ($order->status == 1) {
                if (Gate::check('order-manager') || Gate::check('packingOrder'))
                {
                    $order->status = 2;
                    $order->save();
        
                    //send email
                    $email = new OrderStatusMail($order);
                    Mail::to($order->customer->user->email)->send($email);
        
                    return redirect("admin/order/$order->id")->with('alert-success','Đơn hàng đã chuyển sang đang vận chuyển!');
                }
                else {
                    abort(403);
                }
            }
            elseif ($order->status == 2) {
                if (Gate::check('order-manager') || Gate::check('shippingOrder'))
                {
                    $order->status = 3;
                    $order->save();
        
                    //send email
                    $email = new OrderStatusMail($order);
                    Mail::to($order->customer->user->email)->send($email);
        
                    return redirect("admin/order/$order->id")->with('alert-success','Đơn hàng đã giao thành công!');
                }
                else {
                    abort(403);
                }
            }
        }
    }
}
