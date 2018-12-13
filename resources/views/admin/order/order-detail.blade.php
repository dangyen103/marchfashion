@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Đơn hàng <small> Chi tiết đơn hàng</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/order") }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        
                        @if(session('alert-success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('alert-success')}}
                            </div>
                        @endif

                        @if(session('alert-danger'))
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('alert-danger')}}
                                <a href="{{ asset("admin/order/$order->id/cancel-undo") }}" class="cancel-alert">Hoàn tác</a>
                            </div>
                        @endif

                        <!-- Smart Wizard -->
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <p class="mb-0">
                                    <span class="cl-gray">Mã đơn hàng: </span> 
                                    {{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}
                                </p>
                                <p class="mb-0"><span class="cl-gray">Mã khách hàng: </span> 
                                    {{ str_pad($order->customer_id, 8, '0', STR_PAD_LEFT) }}
                                </p>
                                <p class="mb-0"><span class="cl-gray">Đặt lúc: </span>
                                    {{ date('H:m d/m/Y', strtotime($order->created_at)) }}
                                </p>
                            </div>
                            <div class="txt-right">
                                <h5>
                                    Tổng cộng: 
                                    <span class="cl-red">
                                        {{ number_format($order->total, 0, ',', '.') }} ₫
                                    </span>
                                </h5>
                                @if ($order->cancel_status == 0 && $order->status != 3)
                                    <div class="d-flex-right">
                                        <a href="{{ asset("admin/order/$order->id/cancel") }}" class="btn btn-danger btn-sm mb-0">Hủy đơn</a>
                                        <a href="{{ asset("admin/order/$order->id/change-status") }}" class="btn btn-info btn-sm mr-0 mb-0">{{ $order_action }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid mt-0"></div>

                        <!-- SmartWizard Content -->
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            @if ($order->status == 0)
                                <ul class="wizard_steps">
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">Chờ xác nhận</span>
                                            @if ($order->cancel_status == 1)
                                                <div class="order-cancel">
                                                    <i class="fa fa-close"></i>
                                                    <br>
                                                    Đã bị hủy
                                                </div>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="step_no">2</span>
                                            <span class="step_descr">Đang đóng gói</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="step_no">3</span>
                                            <span class="step_descr">Đang vận chuyển</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="step_no">4</span>
                                            <span class="step_descr">Đã giao hàng</span>
                                        </a>
                                    </li>
                                </ul>
                            @elseif($order->status == 1)
                                <ul class="wizard_steps">
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">Chờ xác nhận</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">2</span>
                                            <span class="step_descr">Đang đóng gói</span>
                                            @if ($order->cancel_status == 1)
                                                <div class="order-cancel">
                                                    <i class="fa fa-close"></i>
                                                    <br>
                                                    Đã bị hủy
                                                </div>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="step_no">3</span>
                                            <span class="step_descr">Đang vận chuyển</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="step_no">4</span>
                                            <span class="step_descr">Đã giao hàng</span>
                                        </a>
                                    </li>
                                </ul>
                            @elseif($order->status == 2)
                                <ul class="wizard_steps">
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">Chờ xác nhận</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">2</span>
                                            <span class="step_descr">Đang đóng gói</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">3</span>
                                            <span class="step_descr">Đang vận chuyển</span>
                                            @if ($order->cancel_status == 1)
                                                <div class="order-cancel">
                                                    <i class="fa fa-close"></i>
                                                    <br>
                                                    Đã bị hủy
                                                </div>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="step_no">4</span>
                                            <span class="step_descr">Đã giao hàng</span>
                                        </a>
                                    </li>
                                </ul>
                            @elseif($order->status == 3)
                                <ul class="wizard_steps">
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">Chờ xác nhận</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">2</span>
                                            <span class="step_descr">Đang đóng gói</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">3</span>
                                            <span class="step_descr">Đang vận chuyển</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="current-order-status">
                                            <span class="step_no">4</span>
                                            <span class="step_descr">Đã giao hàng</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <!-- End SmartWizard Content -->

                        <div class="table-reponsive mt-3">
                            <table id="detailProdTable" class="table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>        
                                        <th class="txt-center">ID</th>
                                        <th class="txt-center">Tên sản phẩm</th>
                                        <th class="txt-center">Màu sắc</th>
                                        <th class="txt-center">Kích thước</th>
                                        <th class="txt-center">Đơn giá</th>
                                        <th class="txt-center">Số lượng</th>
                                        <th class="txt-center">Giảm giá (%)</th>
                                    </tr>
                                </thead>
                                <tbody class="prod-detail-form">
                                     @foreach ($order->product_details as $item)
                                        <tr>
                                            <td class="txt-center">{{ str_pad($item->product->id, 8, '0', STR_PAD_LEFT) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset("uploads/products/".$item->product->thumbnail) }}" alt="hình ảnh" width="80px">
                                                    <div class="ml-1">
                                                        {{ $item->product->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="txt-center">{{ $item->color }}</td>
                                            <td class="txt-center">{{ $item->size }}</td>
                                            <td class="txt-center">{{ number_format($item->product->price, 0, ',', '.') }} ₫</td>
                                            <td class="txt-center">{{ $item->pivot->order_quantity }}</td>
                                            <td class="txt-center">{{ $item->pivot->order_discount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-sm-12 col-lg-6 pl-0">
                                <h5>Thông tin người nhận</h5>
                                <div class="order-receiver-info">
                                    <span class="cl-gray">Họ tên: </span>
                                    {{ $order->receiver_name }}
                                </div>
                                <div class="order-receiver-info">
                                    <span class="cl-gray">SĐT: </span>
                                    {{ $order->receiver_phone }}
                                </div>
                                <div class="order-receiver-info">
                                    <span class="cl-gray">Địa chỉ: </span>
                                    {{ $order->receiver_address.', '.$order->receiver_district.', '.$order->receiver_city }}
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-6 pl-0">
                                <h5>Tổng cộng</h5>
                                <div class="order-receiver-info">
                                    <span class="cl-gray">Tạm tính: </span>
                                    {{ number_format($order->total - $order->shipping_price, 0, ',', '.') }} ₫
                                </div>
                                <div class="order-receiver-info">
                                    <span class="cl-gray">Phí vận chuyển: </span>
                                    {{ number_format($order->shipping_price, 0, ',', '.') }} ₫
                                </div>
                                <div class="order-receiver-info">
                                    <span class="cl-gray">Tổng: </span>
                                    {{ number_format($order->total, 0, ',', '.') }} ₫
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection