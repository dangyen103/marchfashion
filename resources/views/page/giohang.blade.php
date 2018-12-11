@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span>Giỏ hàng
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="#">Thông tin tài khoản</a></li>
						<li><a href="#">Giỏ hàng</a></li>
						<li><a href="#">Quản lý đơn hàng</a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Giỏ hàng</h3>
                        </div>
                        <!-- Cart is empty -->
                        <!-- <div class="col-12 empty-cart txt-center ">
                            <h6 class="cl-gray-2">Bạn chưa có sản phẩm nào trong giỏ.</h6>
                            <img src="imgs/empty-cart.png" alt="empty-cart" width="100px">
                        </div> -->

						<!-- Cart is not empty -->
						<div class="col-12">
                            <div class="cart-count-notice mb-3">
                                Bạn có 2 sản phẩm trong giỏ.
							</div>
						</div>
					</div>

					<div class="row cart-area mx-0 mb-4">
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
                                    <tr>
                                        <td data-th="Sản phẩm">
                                            <div class="row">
                                                <div class="col-12 d-flex align-items-center mt-2 mt-md-0">
                                                    <img class="cart-prod-img" src="uploads/products/3hCxQ-A09.jpg" alt="hình ảnh"/>
                                                    <h6 class="ml-3 cart-prod-name">Áo nơ tay lửng thêu hoa</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Đơn giá">180000₫</td>
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
                                        <td data-th="Thành tiền">180000₫</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-secondary"><i class="far fa-trash-alt"></i></button>								
                                        </td>
                                    </tr>

                                    <tr>
                                        <td data-th="Sản phẩm">
                                            <div class="row">
                                                <div class="col-12 d-flex align-items-center mt-2 mt-md-0">
                                                    <img class="cart-prod-img" src="uploads/products/3hCxQ-A09.jpg" width="100px" height="150px" alt="hình ảnh"/>
                                                    <h6 class="ml-3 cart-prod-name">Áo nơ tay lửng thêu hoa</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Đơn giá">180000₫</td>
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
                                        <td data-th="Thành tiền">180000₫</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-secondary"><i class="far fa-trash-alt"></i></button>								
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr class="visible-xs">
                                        <td class="text-center"><strong>Tổng cộng: <span class="cl-red">180000₫</span></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="hidden-xs"></td>
                                        <td class="hidden-xs text-center">
                                            <strong>Tổng cộng: <span class="cl-red">180000₫</span></strong>
                                        </td>
                                        <td><a href="#" class="btn btn-orage btn-block">Mua hàng</a></td>
                                    </tr>
                                </tfoot>
                            </table>
						</div>
						
						<div class="col-12 cart-checkout">
							<div class="cart-checkout-title">
								<h5 class="txt-center mt-3 mb-4">Thông tin đơn hàng<h5>
							</div>
							<div class="row">

								<div class="col-md-6">
									<form>
										<div class="form-group order-form row mx-0">
										  	<label class="col-form-label">Họ và tên</label>
										  	<div class="order-form-input">
												<input type="text" class="form-control" value="" placeholder="Nhập họ và tên">
										  	</div>
										</div>
										<div class="form-group order-form row mx-0">
										  	<label class="col-form-label">Điện thoại</label>
										  	<div class="order-form-input">
												<input type="text" class="form-control" value="" placeholder="Nhập số điện thoại">
										  	</div>
										</div>
										<div class="form-group order-form row mx-0">
										  	<label class="col-form-label">Địa chỉ</label>
										  	<div class="order-form-input">
												<input type="text" class="form-control" value="" placeholder="Nhập địa chỉ">
										  	</div>
										</div>
										<div class="form-group order-form row mx-0 mb-md-0">
												<label class="col-form-label">Ghi chú</label>
												<div class="order-form-input">
												  <textarea type="text" class="form-control" value="" placeholder="Nhập ghi chú"></textarea>
												</div>
										  </div>
									</form>
								</div>

								<div class="col-md-6 checkout-summary">
									<div class="checkout-summary-row">
										<div class="checkout-summary-label">
											Tạm tính (2 sản phẩm)
										</div>
										<div class="checkout-summary-value">
											360000₫
										</div>
									</div>
									<div class="checkout-summary-row">
										<div class="checkout-summary-label">
											Phí vận chuyển
										</div>
										<div class="checkout-summary-value">
											11000₫
										</div>
									</div>
									<div class="checkout-summary-row chechout-shiping-note">
										(Vận chuyển nội thành Hà Nội 20,000₫; ngoại thành và các tỉnh 35,000₫. Miễn phí vận chuyển cho đơn hàng từ 500,000₫)
									</div>
									<div class="checkout-summary-row">
										<div class="checkout-summary-label">
											Tổng cộng
										</div>
										<div class="checkout-summary-value cl-red">
											<strong>371000₫</strong>
										</div>
									</div>
									<div class="checkout-summary-row">
										<div class="checkout-summary-label">
										</div>
										<div class="checkout-summary-value cl-red">
											<button class="btn btn-orage">Đặt hàng</button>
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