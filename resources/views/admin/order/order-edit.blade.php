@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Đơn hàng <small> Chỉnh sửa</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/order") }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
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
                                action="{{ asset("admin/order/$order->id/edit") }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label class="col-xs-12 font-normal">Mã đơn hàng: {{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}</label>
                                <label class="col-xs-12 font-normal">Đặt vào: {{ date('H:m d/m/Y', strtotime($order->created_at)) }}</label>
                            </div>

                            <div class="">
                                <h4 class="form-section-title">Thông tin nhận hàng</h4>
                                <div class="form-group">
                                    <label class="col-xs-12">Họ tên</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" 
                                            class="form-control"
                                            value="{{ $order->receiver_name }}" 
                                            placeholder="Nhập họ tên"
                                            name="receiver_name"
                                            required>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label class="col-xs-12">Số điện thoại</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" 
                                            class="form-control"
                                            value="{{ $order->receiver_phone }}" 
                                            placeholder="Nhập số điện thoại"
                                            name="receiver_phone"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12">Tỉnh/Thành phố</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" 
                                            class="form-control"
                                            value="{{ $order->receiver_city }}" 
                                            placeholder="Nhập tỉnh/thành phố"
                                            name="receiver_city"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12">Quận/Huyện</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" 
                                            class="form-control"
                                            value="{{ $order->receiver_district }}" 
                                            placeholder="Nhập quận/huyện"
                                            name="receiver_district"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12">Địa chỉ</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" 
                                            class="form-control"
                                            value="{{ $order->receiver_address }}" 
                                            placeholder="Nhập địa chỉ"
                                            name="receiver_address"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <h4 class="form-section-title">Chi tiết đơn hàng</h4>
                                <div class="table-reponsive" style="overflow:auto; margin: 0 10px;">
                                    <table id="detailProdTable" class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>        
                                                <th class="txt-center">Tên sản phẩm</th>
                                                <th class="txt-center">Màu sắc</th>
                                                <th class="txt-center">Kích thước</th>
                                                <th class="txt-center">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody class="prod-detail-form">
                                            @foreach ($order->product_details as $item)
                                                <tr>
                                                    <td>
                                                        <select class="form-control" 
                                                            name="" 
                                                            id="" 
                                                            ">
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="color" 
                                                                name="color[]"
                                                                class="form-control"
                                                                required
                                                                placeholder="Nhập màu sắc"
                                                                value="None"
                                                                type="text">
                                                    </td>
                                                    <td>
                                                        <input id="quantity" 
                                                                name="quantity[]" 
                                                                class="form-control"
                                                                required
                                                                value="1"
                                                                min="1"
                                                                type="number">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <div class="col-xs-12">
                                    <a href="{{ asset("admin/order") }}" class="btn btn-danger">Hủy</a>
                                    <button type="reset" class="btn btn-info">Làm lại</button>
                                    <button type="submit" class="btn btn-success">Lưu</button>
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