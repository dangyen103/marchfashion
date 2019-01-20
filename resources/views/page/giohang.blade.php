@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route("trangchu") }}">Trang chủ</a></li>
					<li>
						<span>›</span>Giỏ hàng
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a></li>
						<li><a class="active" href="{{ asset("gio-hang") }}">Giỏ hàng</a></li>
						<li><a href="{{ asset("don-hang") }}">Quản lý đơn hàng</a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Giỏ hàng</h3>
						</div>
						@if (Cart::count() == 0)
							<!-- Cart is empty -->
							<div class="col-12 empty-cart txt-center ">
								<h6 class="cl-gray-2">Bạn chưa có sản phẩm nào trong giỏ.</h6>
								<img src="{{ asset('imgs/empty-cart.png') }}" alt="empty-cart" width="100px">
							</div>

							<!-- Cart is not empty -->
						@else
							<div class="col-12">
								<div class="cart-count-notice mb-3">
									Bạn có {{ Cart::count() }} sản phẩm trong giỏ.
								</div>
							</div>
						@endif
					</div>


					@if (Cart::count() > 0)
						<div class="row cart-area mx-0 mb-4" id="prodCart">
							<div class="col-12">
								<table id="cart" class="table table-hover table-condensed">
									<thead>
										<tr>
											<th style="width:40%">Sản phẩm</th>
											<th style="width:15%">Đơn giá</th>
											<th style="width:15%">Số lượng</th>
											<th style="width:20%">Thành tiền</th>
											<th style="width:10%"></th>
										</tr>
									</thead>
	
									<tbody>
										@foreach ($cart_products as $item)
											<tr>
												<td data-th="Sản phẩm">
													<div class="row">
														<div class="col-12 d-flex align-items-center mt-2 mt-md-0">
															<img class="cart-prod-img" src="{{ asset("uploads/products/".$item->options->image) }}" alt="hình ảnh"/>
															<div class="ml-3 cart-prod-name">
																<a href="{{ asset("san-pham/".$item->options->product_id."/".$item->options->product_unsigned_name) }}">{{ $item->name }}</a>
																<div class="sub-info">Màu sắc: {{ $item->options->color }}</div>
																<div class="sub-info">Kích thước: Freesize</div>
															</div>
														</div>
													</div>
												</td>
												<td data-th="Đơn giá" class="flex-xs">
													@if ($item->options->discount == 0)
														<span class="cl-red">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
													@else
														<div class="cart-price-group">
															<div class="discount-price-item">{{ number_format($item->price*(100-$item->options->discount)/100, 0, ',', '.') }} ₫</div>
															<div class="price-item">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
															<div class="discount-value-item">-{{ $item->options->discount }} %</div>
														</div>
														<div class="cart-price-group-mobile">
															<span class="discount-price-item">{{ number_format($item->price*(100-$item->options->discount)/100, 0, ',', '.') }} ₫</span>
															<span class="price-item">{{ number_format($item->price, 0, ',', '.') }} ₫</span>
															<span class="discount-value-item">-{{ $item->options->discount }} %</span>
														</div>
													@endif
												</td>
												<td data-th="Số lượng" class="flex-xs">
													<div class="num-prod-group" style="width: 115px">
														<button class="btn-num-product-down">
															<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
														</button>
														<input class="num-product" type="number" name="num-product" value="1">
														<button class="btn-num-product-up">
															<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
														</button>
													</div>
												</td>
												<td data-th="Thành tiền" class="cl-red">{{ number_format($item->price*(100-$item->options->discount)/100*$item->qty, 0, ',', '.') }} ₫</td>
												<td class="actions" data-th="">
													<a href="{{ asset("gio-hang/$item->rowId/xoa") }}" class="btn btn-secondary"><i class="far fa-trash-alt"></i></a>								
												</td>
											</tr>
										@endforeach
									</tbody>
	
									<tfoot>
										<tr class="visible-xs">
											<td class="text-center"><strong>Tổng cộng: <span class="cl-red">180000₫</span></strong></td>
										</tr>
										<tr>
											<td colspan="3" class="hidden-xs"></td>
											<td class="hidden-xs text-center">
												<strong>Tổng cộng: <span class="cl-red" ref="cartSubTotal">
												
												@php
													$sub_total = 0;
													foreach (Cart::content() as $item) {
														$sub_total = $sub_total + ($item->price*(100-$item->options->discount)/100);
													}
													echo number_format($sub_total, 0, ',', '.').' ₫';
												@endphp
	
												</span></strong>
											</td>
											<td><button 
												v-on:click="showCartCheckout"
												v-if="isShowBuyBtn"
												class="btn btn-orage btn-block">Mua hàng</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							
							<div class="col-12 cart-checkout" v-if="isShowCartCheckout">
								<div class="cart-checkout-title">
									<h5 class="txt-center mt-3 mb-4">Thông tin đơn hàng<h5>
								</div>
								<form action="{{ asset('dat-hang') }}"
										method="GET">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group order-form row mx-0">
												<label class="col-form-label">Họ và tên</label>
												<div class="order-form-input">
													<input type="text"
														name="receiver_name" 
														class="form-control" 
														value="{{ Auth::user()->name }}" 
														placeholder="Nhập họ và tên">
												</div>
											</div>
											<div class="form-group order-form row mx-0">
												<label class="col-form-label">Điện thoại</label>
												<div class="order-form-input">
													<input type="text" 
															name="receiver_phone"
															class="form-control" 
															value="{{ Auth::user()->customer->phone }}" 
															placeholder="Nhập số điện thoại">
												</div>
											</div>
											<div class="form-group order-form row mx-0">
												<label class="col-form-label">Tỉnh/TP</label>
												<div class="order-form-input">
													<select 
														name="receiver_city"
														v-model="receiver_city"
														class="form-control">
														@foreach ($cities as $item)
															<option value="{{ $item->name }}"
																@if (Auth::user()->customer->city == $item->name)
																	selected
																@endif
															>{{ $item->name }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group order-form row mx-0">
												<label class="col-form-label">Quận/Huyện</label>
												<div class="order-form-input">
													<input type="text" 
															name="receiver_district"
															class="form-control" 
															value="{{ Auth::user()->customer->district }}" 
															placeholder="Nhập quận/huyện">
												</div>
											</div>
											<div class="form-group order-form row mx-0 mb-md-0">
												<label class="col-form-label">Địa chỉ</label>
												<div class="order-form-input">
													<input type="text" 
														name="receiver_address"
														class="form-control" 
														value="{{ Auth::user()->customer->address }}" 
														placeholder="Nhập địa chỉ">
												</div>
											</div>
										</div>
		
										<div class="col-md-6 checkout-summary">
											<div class="checkout-summary-row">
												<div class="checkout-summary-label">
													Tạm tính ({{ Cart::count() }} sản phẩm)
												</div>
												<div class="checkout-summary-value">
													@{{ convertNumber(subTotal()) }}
												</div>
											</div>
											<div class="checkout-summary-row">
												<div class="checkout-summary-label">
													Phí vận chuyển
												</div>
												<div class="checkout-summary-value">
													@{{ shipingPriceConvert() }}
													{{-- @{{ convertNumber(order.shipping_price) }} --}}
												</div>
											</div>
											<div class="checkout-summary-row chechout-shiping-note">
												(Vận chuyển trong Hà Nội 20,000₫; các tỉnh 35,000₫. Miễn phí vận chuyển cho đơn hàng từ 500,000₫)
											</div>
											<div class="checkout-summary-row">
												<div class="checkout-summary-label">
													Tổng cộng
												</div>
												<div class="checkout-summary-value cl-red">
													<strong>@{{ convertNumber(subTotal() + shipingPrice()) }}</strong>
												</div>
											</div>
											<div class="checkout-summary-row">
												<div class="checkout-summary-label">
												</div>
												<div class="checkout-summary-label">
													<a class="btn btn-light" v-on:click="hiddenCartCheckout">Hủy</a>
													<button type="submit" class="btn btn-orage">Đặt hàng</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection