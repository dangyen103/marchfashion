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
                                action="{{ asset("admin/user/change-password") }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu cũ</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" 
                                            class="form-control" 
                                            value=""
                                            placeholder="Nhập mật khẩu cũ"
                                            name="name"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu mới</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" 
                                            class="form-control" 
                                            value=""
                                            placeholder="Nhập mật khẩu mới"
                                            name="name"
                                            id="newPassword"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Xác nhận mật khẩu</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" 
                                            class="form-control" 
                                            value=""
                                            placeholder="Xác nhận mật khẩu"
                                            name="name"
                                            id="confirmNewPassword"
                                            required>
                                    </div>
                                </div>
                            
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="{{ asset('admin/user') }}"" class="btn btn-danger">Hủy</a>
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