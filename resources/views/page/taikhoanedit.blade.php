@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
					<li>
						<span>›</span>Thông tin tài khoản
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4">
                <!-- Left Sidebar -->
				<div class="col-lg-2-5 pt-5 left-sidebar">
					<ul id="left-nav" class="nav-sidebar-black">
						<li><a class="active"href="{{ asset("tai-khoan") }}">Thông tin tài khoản</a></li>
						<li><a href="{{ asset("gio-hang") }}">Giỏ hàng</a></li>
						<li><a href="{{ asset("don-hang") }}">Đơn hàng của tôi</a></li>
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
                                <form class="w-100 account-info-edit"
                                        method="POST"
                                        action="{{ asset('tai-khoan/chinh-sua') }}">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                    @if(count($errors)>0)
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            @foreach($errors->all() as $err)
                                                {{$err}}<br>
                                            @endforeach
                                        </div>
                                    @endif
                        
                                    @if(session('alert-success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{session('alert-success')}}
                                        </div>
                                    @endif
                        
                                    @if(session('alert-danger'))
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{session('alert-danger')}}
                                        </div>
                                    @endif

                                    <div class="form-row">
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputName">Họ tên</label>
                                            <input  type="text" 
                                                    class="form-control w-90" 
                                                    name="name"
                                                    disabled
                                                    value="{{ Auth::user()->name }}"
                                                    placeholder="Nhập họ tên">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputEmail">Email</label>
                                            <input  type="email" 
                                                    class="form-control w-90" 
                                                    id="inputEmail" 
                                                    value="dangthiyen103@gmail.com"
                                                    disabled
                                                    placeholder="Nhập email">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputPhone">Số điện thoại</label>
                                            <input  type="text" 
                                                    class="form-control w-60" 
                                                    name="phone"
                                                    value="{{ Auth::user()->customer->phone }}"
                                                    placeholder="Nhập số điện thoại">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputBirthday">Ngày sinh</label>
                                            <input  type="date" 
                                                    class="form-control w-60" 
                                                    name="birthday"
                                                    value="{{ date('Y-m-d', strtotime(Auth::user()->customer->birthday)) }}">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputGender">Giới tính</label>
                                            <select name="gender" class="form-control w-25">
                                                @if ( Auth::user()->customer->gender == 0 )
                                                    <option selected value="0">Nữ</option>
                                                    <option value="1">Nam</option>
                                                @else
                                                    <option value="0">Nữ</option>
                                                    <option value="1" selected>Nam</option>
                                                @endif
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputName">Tỉnh/Thành Phố</label>
                                            <input  type="text" 
                                                    class="form-control w-90" 
                                                    name="city" 
                                                    value="{{ Auth::user()->customer->city }}"
                                                    placeholder="Nhập Tỉnh/Thành Phố">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputEmail">Quận/Huyện</label>
                                            <input  type="text" 
                                                    class="form-control w-90" 
                                                    name="district" 
                                                    value="{{ Auth::user()->customer->district }}"
                                                    placeholder="Nhập Quận/Huyện">
                                        </div>
                                        <div class="form-group col-md-4 mb-30">
                                            <label for="inputPhone">Địa chỉ</label>
                                            <input  type="text"
                                                    name="address" 
                                                    class="form-control w-90" 
                                                    value="{{ Auth::user()->customer->address }}"
                                                    placeholder="Nhập số điện thoại">
                                        </div>
                                        
                                    </div>
                                    <div class="btn-acc-edit-group">
                                        <a href="{{ asset('tai-khoan') }}" class="btn btn-cancle">Hủy</a>
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