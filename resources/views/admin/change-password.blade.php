@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thay đổi mật khẩu</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <form class="form-horizontal form-label-left"
                                action="{{ asset("admin/change-password") }}" 
                                method="POST"
                                enctype="multipart/form-data">

                             @if(count($errors)>0)
                                <div class="alert alert-danger alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
              
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
                                </div>
                            @endif

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" 
                                            class="form-control" 
                                            placeholder="Nhập mật khẩu"
                                            name="current_password"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu mới</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" 
                                            class="form-control" 
                                            placeholder="Nhập mật khẩu mới"
                                            name="newpassword"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Xác nhận mật khẩu</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" 
                                            class="form-control" 
                                            placeholder="Xác nhận mật khẩu"
                                            name="confirm_newpassword"
                                            required>
                                    </div>
                                </div>
                            
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
                                        <button type="submit" class="btn btn-success">Xác nhận</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection