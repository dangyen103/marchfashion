@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span>Đăng nhập tài khoản
					</li>
				</ul>
			</div>
			<div class="row mt-2 mb-4 login-form">
				<div class="w-lg-60 w-md-80 mx-auto">
                    <h3 class="text-center mb-4">Đăng nhập</h3>

                    <form method="POST" 
                            action="{{ asset('login') }}"
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
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" 
                                        type="password" 
                                        class="form-control" 
                                        name="password" 
                                        placeholder="Nhập mật khẩu"
                                        required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">Đăng nhập</button>
                                <span class="not-has-account">
                                    Chưa có tải khoản?
                                    <a href="{{ asset('signin') }}">
                                        {{ __('Đăng kí ngay.') }}
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