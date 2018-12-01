@extends('admin.layout.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small> Thêm mới quản trị viên</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Nhập họ tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" class="form-control" placeholder="Nhập email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Trạng thái
                            </label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked name="iCheck"> Hoạt động
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="iCheck"> Vô hiệu hóa
                                    </label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Quyền
                            </label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" value=""> Option one. select more than one options
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" value=""> Option two. select more than one options
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-danger">Hủy</button>
                            <button type="reset" class="btn btn-info">Làm lại</button>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection