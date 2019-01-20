@extends('layouts.index')

@section('content')
<div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
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
                            <h3 class="txt-center pt-2">Chi tiết đơn hàng</h3>
                        </div>
                        
                        <div class="col-12 order-list-area mb-30">
                            <div class="row mx-0 order-list-row">
                                <div class="col-12">
                                    <div class="order-info-block">
                                        <div class="order-info-block-l">
                                            <div class="order-info-block-name">
                                                Đơn hàng <a>#{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}</a>
                                            </div>
                                            <div class="order-info-block-time">
                                                Đặt ngày {{ date('d-m-Y H:i', strtotime($order->created_at)) }}
                                            </div>
                                        </div>
                                        <div class="order-info-block-r">
                                            <span class="pr-2">Tổng cộng:</span>
                                            <strong class="cl-red txt-total">{{ number_format($order->total, 0, ',', '.') }} ₫</strong>
                                        </div>
                                    </div>

                                    <!-- Order Status Progress -->
                                    <div class="order-status-progress my-5">
                                        @if ($order->cancel_status == 1)
                                            <div class="order-cancel cl-red">
                                                Đã bị hủy
                                            </div>
                                        @endif
                                        <div class="progress">
                                            @if ($order->status == 0)
                                                <div class="progress-bar" style="width: 0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            @elseif($order->status == 1)
                                                <div class="progress-bar" style="width: 33.3333333%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            @elseif($order->status == 2)
                                                <div class="progress-bar" style="width: 66.6666667%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            @else
                                                <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            @endif
                                        </div>
                                        <div class="row mx-0">
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Chờ xác nhận</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Đang đóng gói</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Đang vận chuyển</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="order-status-node">
                                                    <div class="order-status-node-dot"></div>
                                                    <div class="order-status-node-name">Đã giao hàng</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Order Status Progress -->

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
                        </div>
                        
                        <div class="col-12 order-detail-area">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="order-detail-block">
                                        <div class="order-detail-block-title">
                                            Thông tin người nhận
                                        </div>
                                        <div class="order-detail-block-list">
                                            <div class="order-detail-block-item">
                                                {{ $order->receiver_name }}
                                            </div>
                                            <div class="order-detail-block-item">
                                                {{ $order->receiver_address.', '.$order->receiver_district.', '.$order->receiver_city }}
                                            </div>
                                            <div class="order-detail-block-item">
                                                {{ $order->receiver_phone }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="order-detail-block">
                                        <div class="order-detail-block-title">
                                            Tổng cộng
                                        </div>
                                        <div class="order-detail-block-total">
                                            <div class="block-total-item">
                                                <div class="block-total-label">Tạm tính</div>
                                                <div class="block-total-value">{{ number_format($order->total - $order->shipping_price, 0, ',', '.') }} ₫</div>
                                            </div>
                                            <div class="block-total-item">
                                                <div class="block-total-label">Phí vận chuyện</div>
                                                <div class="block-total-value">{{ number_format($order->shipping_price, 0, ',', '.') }} ₫</div>
                                            </div>
                                            <div class="block-total-item">
                                                <div class="block-total-label">Tổng</div>
                                                <div class="block-total-value">{{ number_format($order->total, 0, ',', '.') }} ₫</div>
                                            </div>
                                        </div>
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