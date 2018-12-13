@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Đơn hàng <small> {{ $status }}</small></h3>
            </div>
            {{-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/user/add") }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Thêm quản trị viên</a>
                    </div>
                </div>
            </div> --}}
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
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="txt-center">ID</th>
                                    <th class="txt-center">Khách hàng ID</th>
                                    <th class="txt-center">Tên người nhận</th>
                                    <th class="txt-center">SĐT người nhận</th>
                                    <th class="txt-center">Địa chỉ người nhận</th>
                                    <th class="txt-center">Trạng thái</th>
                                    <th class="txt-center">Hành động</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($orders as $item)
                                    <tr>
                                        <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                        <td class="txt-center">{{ str_pad($item->customer->id, 8, '0', STR_PAD_LEFT) }}</td>
                                        <td class="txt-center">{{ $item->receiver_name }}</td>
                                        <td class="txt-center">{{ $item->receiver_phone }}</td>
                                        <td class="txt-center">{{ $item->receiver_address }}</td>

                                        @if ($item->cancel_status == 0)
                                            @if ($item->status == 0)
                                                <td class="order-status-confirm txt-center">
                                                    <span>Chờ xác nhận</span>
                                                </td>
                                            @elseif($item->status == 1)
                                                <td class="order-status-packing txt-center">
                                                    <span>Đang đóng gói</span>
                                                </td>
                                            @elseif($item->status == 2)
                                                <td class="order-status-shipping txt-center">
                                                    <span>Đang vận chuyển</span>
                                                </td>
                                            @elseif($item->status == 3)
                                                <td class="order-status-completed txt-center">
                                                    <span>Đã giao hàng</span>
                                                </td>
                                            @endif
                                        @else
                                            <td class="order-status-cancel txt-center">
                                                <span>Đã bị hủy</span>
                                            </td>
                                        @endif


                                        <td class="txt-center">
                                            <a href="{{ asset("admin/order/$item->id") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                <i class="fa fa-info"></i>
                                            </a>
                                                                                      
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection