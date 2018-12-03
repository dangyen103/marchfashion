@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small> Danh sách user</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/user/add") }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Thêm quản trị viên</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs bg-trans" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Khách hàng</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Quản trị viên</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th class="txt-center">Tên</th>
                                            <th class="txt-center">Email</th>
                                            <th class="txt-center">Số điện thoại</th>
                                            <th class="txt-center">Giới tính</th>
                                            <th class="txt-center">Tỉnh/Thành phố</th>
                                            <th class="txt-center">Quận/Huyện</th>
                                            <th class="txt-center">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($user_customers as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td class="txt-center">{{ $item->customer['phone'] }}</td>

                                                    @if ($item->customer['gender'] == 0)
                                                        <td class="txt-center">Nữ</td>
                                                    @else
                                                        <td class="txt-center">Nam</td>
                                                    @endif

                                                    <td class="txt-center">{{ $item->customer['city'] }}</td>
                                                    <td class="txt-center">{{ $item->customer['district'] }}</td>
                                                    <td class="txt-center">
                                                        <a href="#" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>
                                                        {{-- <a href="#" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <table id="datatable2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th class="txt-center">Tên</th>
                                            <th class="txt-center">Email</th>
                                            <th class="txt-center">Quyền</th>
                                            <th class="txt-center">Trạng Thái</th>
                                            <th class="txt-center">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($user_admins as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        @foreach ($item->adminitrator->roles as $key => $role)
                                                            <span>{{ $role->name }}</span><br>
                                                        @endforeach
                                                    </td>
                                                    
                                                    @if ($item->adminitrator['status'] == 1)
                                                        <td class="admin-status-active txt-center">
                                                            <span>Hoạt động</span>
                                                        </td>
                                                    @else
                                                        <td class="admin-status-disabled txt-center">
                                                            <span>Vô hiệu hóa</span>
                                                        </td>
                                                    @endif

                                                    <td class="txt-center">
                                                        {{-- <a href="#" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a> --}}
                                                        <a href="{{ asset("admin/user/edit/$item->id") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ asset("admin/user/delete/$item->id") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                            <i class="fa fa-trash-o"></i>
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
        </div>
    </div>
</div>
@endsection