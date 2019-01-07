@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sản phẩm <small> Thông tin chi tiết</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-5 col-sm-6 col-xs-12 mt-1">
                            <div class="product-image">
                                <img width="100%" src="{{ asset("uploads/products/$product->thumbnail") }}" width="100%" alt="..." />
                            </div>
                        </div>
    
                        <div class="col-md-7 col-sm-6 col-xs-12 mt-1" style="border:0px solid #e5e5e5;">
                            <h3 class="prod_title">{{ $product->name }}</h3>
                            <div class="mb-3">
                                <p>Nhãn: <span class="cl-blue">{{ $product->label }}</span></p>
                            </div>
                            <div class="mb-3 cl-red">
                                <h3> {{ number_format($product->price, 0, ',', '.') }} ₫</h3>
                            </div>
                            <div class="mb-3">
                                <h2>Chi tiết</h2>
                                <div class="table-reponsive">
                                    <table id="detailProdTable" class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>        
                                                <th class="txt-center" style="width: 30%">Kích thước</th>
                                                <th class="txt-center" style="width: 30%">Màu sắc</th>
                                                <th class="txt-center" style="width: 20%">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody class="prod-detail-form">
                                            @foreach ($product->product_details as $item)
                                                <tr>
                                                    <td class="txt-center">{{ $item->size }}</td>
                                                    <td class="txt-center">{{ $item->color }}</td>
                                                    <td class="txt-center">{{ $item->quantity }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h2>Mô tả</h2>
                                <p>{{ $product->description }}</p>
                            </div>     

                            @can('prod-manager')
                                <div class="">
                                    <a href="{{ asset("admin/product/$product->id/$product->name/edit") }}" class="btn btn-info">Chỉnh sửa</a>
                                    <a href="{{ asset("admin/product/$product->id/$product->name/delete") }}" class="btn btn-danger">Xóa</a>
                                </div>
                            @endcan

                        </div>

                        <div class="col-xs-12 mt-3">
                            <div class="gallery-img-title">Hình ảnh của sản phẩm</div>
                            <div class="row gallery-img-row">
                                @foreach ($product->images as $item)
                                    <div class="col-xs-2 gallery-img-col">
                                        <img src="{{ asset("uploads/products/$item->image") }}" alt="hình ảnh" onclick="openGalleryImg(this);">
                                    </div>
                                @endforeach
                            </div>

                            <div class="row gallery-img-view">
                                <!-- Close the image -->
                                <span onclick="this.parentElement.style.display='none'" class="btn-close">&times;</span>
                            
                                <!-- Expanded image -->
                                <img id="galleryImgView" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection