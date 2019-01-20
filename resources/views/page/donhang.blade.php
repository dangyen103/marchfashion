@extends('layouts.index')

@section('content')
<div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route("trangchu") }}">Trang chủ</a></li>
					<li>
						<span>›</span>Đơn hàng của tôi
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a></li>
						<li><a href="{{ asset("gio-hang") }}">Giỏ hàng</a></li>
						<li><a class="active" href="{{ asset("don-hang") }}">Đơn hàng của tôi</a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Đơn hàng của tôi</h3>
                        </div>

                        @if (count($orders == 0))
                            <!-- Order is empty -->
                            <div class="col-12 empty-order txt-center ">
                                <h6 class="cl-gray-2 txt-s1">Bạn chưa có đơn hàng nào.</h6>
                                <img src="{{ asset('imgs/empty-cart.png') }}" alt="empty-cart" width="100px">
                            </div>
                            <!-- Cart is not empty -->
                        @else
                            <div class="col-12 order-list-area">
                                <div class="order-count-notice mb-3">
                                    Bạn có {{ count($orders) }} đơn hàng.
                                </div>
                                <!-- Order List Row -->
                                @foreach ($orders as $order)
                                    <div class="row mx-0 order-list-row mb-4">
                                        <div class="col-12">
                                            <div class="order-info-block">
                                                <div class="order-info-block-l">
                                                    <div class="order-info-block-name">
                                                        Đơn hàng <a href="{{ asset("don-hang/$order->id/chi-tiet") }}">#{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}</a>
                                                    </div>
                                                    <div class="order-info-block-time">
                                                        Đặt ngày {{ date('d-m-Y H:i', strtotime($order->created_at)) }}
                                                    </div>
                                                </div>
                                                <div class="order-item-status">
                                                        @if ($order->cancel_status == 0)
                                                            @if ($order->status == 0)
                                                                <span>Chờ xác nhận</span>
                                                            @elseif($order->status == 1)
                                                                <span>Đang đóng gói</span>
                                                            @elseif($order->status == 2)
                                                                <span>Đang vận chuyển</span>
                                                            @elseif($order->status == 3)
                                                                <span>Đã giao hàng</span>
                                                            @endif
                                                        @else
                                                            <span>Đã bị hủy</span>
                                                        @endif
                                                </div>
                                                <div class="order-info-block-r">
                                                    <a href="{{ asset("don-hang/$order->id/chi-tiet") }}">Chi tiết</a>
                                                </div>
                                            </div>
                                            <div class="order-items-block">
                                                @foreach ($order->product_details as $item)
                                                    <div class="row order-item-block">
                                                        <div class="col-sm-5 order-item-prod">
                                                            <img class="order-item-img" src="{{ asset("uploads/products/".$item->product->thumbnail) }}" alt="hình ảnh">
                                                            <div class="order-item-name">
                                                                {{ $item->product->name }}
                                                                <div class="order-item-price-xs">
                                                                    <span class="cl-red">{{ number_format($item->product->price*(100 - $item->pivot->order_discount)/100, 0, ',', '.') }} ₫</span>
                                                                </div>
                                                                <div class="order-item-num-xs">
                                                                    <span>x</span> {{ $item->pivot->order_quantity }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 order-item-price">
                                                            <span class="cl-red">{{ number_format($item->product->price*(100 - $item->pivot->order_discount)/100, 0, ',', '.') }} ₫</span>
                                                        </div>
                                                        <div class="col-sm-4 order-item-num">
                                                            <span>x</span> {{ $item->pivot->order_quantity }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach                              
                                <!-- End Order List Row -->
                            </div>
                        @endif
                        
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection