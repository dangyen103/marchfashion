@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small> Thêm mới quản trị viên</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset('admin/user') }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

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

                        <form class="form-horizontal form-label-left"
                                action="{{ asset('admin/user/add') }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Họ tên</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" 
                                        class="form-control" 
                                        placeholder="Nhập họ tên"
                                        name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" 
                                        class="form-control" 
                                        placeholder="Nhập email"
                                        name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Trạng thái
                                </label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" checked name="status" value="1"> Hoạt động
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="0"> Vô hiệu hóa
                                        </label>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Quyền
                                </label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    
                                    @foreach ($roles as $item)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" 
                                                    value="{{ $item->id }}" 
                                                    name="roles[]"> {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a href="{{ asset('admin/user') }}" class="btn btn-danger">Hủy</a>
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