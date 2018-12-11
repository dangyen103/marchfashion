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
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a href="#">Thông tin tài khoản</a></li>
						<li><a href="#">Giỏ hàng</a></li>
						<li><a href="#">Đơn hàng của tôi</a></li>
					</ul>
                </div>
                <!-- End Left Sidebar -->
                
				<div class="col-md-12 col-lg-8-5">			
					<div class="row">
                        <div class="col-12 mb-3">
                            <h3 class="txt-center pt-2">Thông tin tài khoản</h3>
                        </div>
                        
                        <div class="col-12">
                            <div class="row account-info mx-0 px-4">
                                <form class="w-100 account-info-edit">
                                    <div class="form-row">
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputName">Họ tên</label>
                                            <input  type="text" 
                                                    class="form-control w-90" 
                                                    id="inputName" 
                                                    value="Đặng Thị Yến"
                                                    placeholder="Nhập họ tên">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputEmail">Email</label>
                                            <input  type="email" 
                                                    class="form-control w-90" 
                                                    id="inputEmail" 
                                                    value="dangthiyen103@gmail.com"
                                                    placeholder="Nhập email">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputPhone">Số điện thoại</label>
                                            <input  type="text" 
                                                    class="form-control w-60" 
                                                    id="inputPhone" 
                                                    value="0985690342"
                                                    placeholder="Nhập số điện thoại">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputBirthday">Ngày sinh</label>
                                            <input  type="date" 
                                                    class="form-control w-60" 
                                                    id="inputBirthday" 
                                                    value="1996-03-10"
                                                    placeholder="Nhập số điện thoại">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputGender">Giới tính</label>
                                            <select id="inputGender" class="form-control w-25">
                                                <option selected>Nữ</option>
                                                <option>Nam</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="btn-acc-edit-group">
                                        <button type="submit" class="btn btn-cancle">Hủy</button>
                                        <button type="submit" class="btn btn-save">Lưu</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection