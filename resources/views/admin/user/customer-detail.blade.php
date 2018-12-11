@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small> Thông tin chi tiết</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/user") }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên:</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label font-normal">{{ $user->name}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label font-normal">{{ $user->email}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Giới tính:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        @if ($user->customer['gender'])
                                            Nam
                                        @else
                                            Nữ
                                        @endif
                                    </label>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Ngày sinh:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ date( "d/m/Y", strtotime( $user->customer['birthday'] ) ) }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Số điện thoại:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $user->customer['phone'] }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Địa chỉ:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $user->customer['address'] }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Phong cách thời trang:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $user->customer['fashion_style'] }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Mức chi tiêu:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        @if ($user->customer['spend_money'] == 'low')
                                            Thấp
                                        @else
                                            @if ($user->customer['spend_money'] == 'medium')
                                                Trung bình
                                            @else
                                                Cao
                                            @endif
                                        @endif
                                    </label>
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