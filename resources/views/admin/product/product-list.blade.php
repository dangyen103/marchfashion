@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sản phẩm <small> Danh sách sản phẩm</small></h3>
            </div>
            @can('prod-manager')
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="d-flex-right">
                            <a href="{{ asset("admin/product/add") }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Thêm sản phẩm</a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs bg-trans" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="all-products-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="top-products-tab" data-toggle="tab" aria-expanded="false">Áo</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="pants-products-tab" data-toggle="tab" aria-expanded="false">Quần</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="dress-products-tab" data-toggle="tab" aria-expanded="false">Váy</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="set-products-tab" data-toggle="tab" aria-expanded="false">Bộ</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content6" role="tab" id="accessories-products-tab" data-toggle="tab" aria-expanded="false">Phụ kiện</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">

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

                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="all-products-tab">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="txt-center" style="width: 5%">ID</th>
                                                <th class="txt-center" style="width: 25%">Tên sản phẩm</th>
                                                <th class="txt-center" style="width: 15%">Loại</th>
                                                <th class="txt-center" style="width: 15%">Giá</th>
                                                <th class="txt-center" style="width: 25%">Nhãn</th>
                                                <th class="txt-center" style="width: 15%">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($all_products as $item)
                                                <tr>
                                                    <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="d-flex flex-row align-items-center">
                                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" width="60px" alt="">
                                                        <div class="ml-1">{{ $item->name }}</div>
                                                    </td>
                                                    <td class="txt-center">{{ $item->category['name'] }}</td>
                                                    <td class="txt-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                                    <td class="txt-center">{{ $item->label }}</td>
                                                    <td class="txt-center">
                                                        <a href="{{ asset("admin/product/$item->id/$item->name") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>

                                                        @can('prod-manager')
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/edit") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/delete") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endcan

                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="top-products-tab">
                                    <table id="datatable2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="txt-center" style="width: 5%">ID</th>
                                                <th class="txt-center" style="width: 25%">Tên sản phẩm</th>
                                                <th class="txt-center" style="width: 15%">Loại</th>
                                                <th class="txt-center" style="width: 15%">Giá</th>
                                                <th class="txt-center" style="width: 25%">Nhãn</th>
                                                <th class="txt-center" style="width: 15%">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($top as $item)
                                                <tr>
                                                    <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="d-flex flex-row align-items-center">
                                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" width="60px" alt="">
                                                        <div class="ml-1">{{ $item->name }}</div>
                                                    </td>
                                                    <td class="txt-center">{{ $item->category['name'] }}</td>
                                                    <td class="txt-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                                    <td class="txt-center">{{ $item->label }}</td>
                                                    <td class="txt-center">
                                                        <a href="{{ asset("admin/product/$item->id/$item->name") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>

                                                        @can('prod-manager')
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/edit") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/delete") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="pants-products-tab">
                                    <table id="datatable3" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="txt-center" style="width: 5%">ID</th>
                                                <th class="txt-center" style="width: 25%">Tên sản phẩm</th>
                                                <th class="txt-center" style="width: 15%">Loại</th>
                                                <th class="txt-center" style="width: 15%">Giá</th>
                                                <th class="txt-center" style="width: 25%">Nhãn</th>
                                                <th class="txt-center" style="width: 15%">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($pants as $item)
                                                <tr>
                                                    <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="d-flex flex-row align-items-center">
                                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" width="60px" alt="">
                                                        <div class="ml-1">{{ $item->name }}</div>
                                                    </td>
                                                    <td class="txt-center">{{ $item->category['name'] }}</td>
                                                    <td class="txt-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                                    <td class="txt-center">{{ $item->label }}</td>
                                                    <td class="txt-center">
                                                        <a href="{{ asset("admin/product/$item->id/$item->name") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>
                                                        @can('prod-manager')
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/edit") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/delete") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="dress-products-tab">
                                    <table id="datatable4" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="txt-center" style="width: 5%">ID</th>
                                                <th class="txt-center" style="width: 25%">Tên sản phẩm</th>
                                                <th class="txt-center" style="width: 15%">Loại</th>
                                                <th class="txt-center" style="width: 15%">Giá</th>
                                                <th class="txt-center" style="width: 25%">Nhãn</th>
                                                <th class="txt-center" style="width: 15%">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($dress as $item)
                                                <tr>
                                                    <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="d-flex flex-row align-items-center">
                                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" width="60px" alt="">
                                                        <div class="ml-1">{{ $item->name }}</div>
                                                    </td>
                                                    <td class="txt-center">{{ $item->category['name'] }}</td>
                                                    <td class="txt-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                                    <td class="txt-center">{{ $item->label }}</td>
                                                    <td class="txt-center">
                                                        <a href="{{ asset("admin/product/$item->id/$item->name") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>

                                                        @can('prod-manager')
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/edit") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/delete") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="set-products-tab">
                                    <table id="datatable4" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="txt-center" style="width: 5%">ID</th>
                                                <th class="txt-center" style="width: 25%">Tên sản phẩm</th>
                                                <th class="txt-center" style="width: 15%">Loại</th>
                                                <th class="txt-center" style="width: 15%">Giá</th>
                                                <th class="txt-center" style="width: 25%">Nhãn</th>
                                                <th class="txt-center" style="width: 15%">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($set as $item)
                                                <tr>
                                                    <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="d-flex flex-row align-items-center">
                                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" width="60px" alt="">
                                                        <div class="ml-1">{{ $item->name }}</div>
                                                    </td>
                                                    <td class="txt-center">{{ $item->category['name'] }}</td>
                                                    <td class="txt-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                                    <td class="txt-center">{{ $item->label }}</td>
                                                    <td class="txt-center">
                                                        <a href="{{ asset("admin/product/$item->id/$item->name") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>

                                                        @can('prod-manager')
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/edit") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/delete") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="accessories-products-tab">
                                    <table id="datatable5" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="txt-center" style="width: 5%">ID</th>
                                                <th class="txt-center" style="width: 25%">Tên sản phẩm</th>
                                                <th class="txt-center" style="width: 15%">Loại</th>
                                                <th class="txt-center" style="width: 15%">Giá</th>
                                                <th class="txt-center" style="width: 25%">Nhãn</th>
                                                <th class="txt-center" style="width: 15%">Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($accessories as $item)
                                                <tr>
                                                    <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="d-flex flex-row align-items-center">
                                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" width="60px" alt="">
                                                        <div class="ml-1">{{ $item->name }}</div>
                                                    </td>
                                                    <td class="txt-center">{{ $item->category['name'] }}</td>
                                                    <td class="txt-center">{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                                    <td class="txt-center">{{ $item->label }}</td>
                                                    <td class="txt-center">
                                                        <a href="{{ asset("admin/product/$item->id/$item->name") }}" title="Xem chi tiết" class="btn btn-success btn-xs btn-action">
                                                            <i class="fa fa-info"></i>
                                                        </a>

                                                        @can('prod-manager')
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/edit") }}" title="Chỉnh sửa" class="btn btn-info btn-xs  btn-action">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ asset("admin/product/$item->id/$item->name/delete") }}" title="Xóa" class="btn btn-danger btn-xs  btn-action">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endcan
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