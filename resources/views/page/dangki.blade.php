@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span>Đăng kí tài khoản
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4 login-form signin-form">
				<div class="w-lg-60 w-md-80 mx-auto">
                    <h3 class="text-center mb-4">Đăng kí tài khoản</h3>

                    <form method="POST" 
                            action="{{ asset('signin') }}"
                            enctype="multipart/form-data">

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

                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">*Họ tên</label>
                            <div class="col-md-6">
                                <input 
                                        type="text" 
                                        class="form-control" 
                                        name="name" 
                                        placeholder="Nhập họ tên"
                                        required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Ngày sinh</label>
                            <div class="col-md-6">
                                <input 
                                        type="date"
                                        value="{{ date('1990-01-01') }}"
                                        class="form-control" 
                                        name="birthday">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Giới tính</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="gender" value="1">
                                    <label class="form-check-label" for="inlineCheckbox1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="0">
                                    <label class="form-check-label" for="inlineCheckbox2">Nữ</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Tỉnh/Thành phố</label>
                            <div class="col-md-6">
                                <select name="city"
                                        id="city" 
                                        class="form-control dynamic" 
                                        >
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                    @foreach ($cities as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Quận/Huyện</label>
                            <div class="col-md-6">
                                <select name="district"
                                        id="district" 
                                        class="form-control dynamic" 
                                        >
                                        <option value="">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Địa chỉ</label>
                            <div class="col-md-6">
                                <input 
                                        type="text" 
                                        class="form-control" 
                                        name="address" 
                                        placeholder="Nhập địa chỉ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Số điện thoại</label>
                            <div class="col-md-6">
                                <input 
                                        type="text" 
                                        class="form-control" 
                                        name="phone" 
                                        placeholder="Nhập số điện thoại">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">*Email</label>

                            <div class="col-md-6">
                                <input id="email" 
                                        type="email" 
                                        class="form-control" 
                                        name="email" 
                                        placeholder="Nhập email"
                                        required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">*Mật khẩu</label>
                            <div class="col-md-6">
                                <input id="password" 
                                        type="password" 
                                        class="form-control" 
                                        name="password" 
                                        placeholder="Nhập mật khẩu"
                                        required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">*Xác nhận mật khẩu</label>
                            <div class="col-md-6">
                                <input 
                                        type="password" 
                                        class="form-control" 
                                        name="confirm_password" 
                                        placeholder="Xác nhận mật khẩu"
                                        required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">Đăng kí</button>
                                <span class="not-has-account">
                                    Đã có tải khoản?
                                    <a href="{{ asset('login') }}">
                                        {{ __('Đăng nhập tại đây.') }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
@endsection