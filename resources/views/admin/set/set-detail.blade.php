@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Set trang phục <small> Thông tin chi tiết</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset('admin/set') }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-xs-12 mt-1">
                            <h3>Mô tả</h3>
                            <p>{{ $set->description }}</p>
                        </div>
                        <div class="col-xs-12">
                            <div class="gallery-img-title">Sản phẩm trong set</div>
                            <div class="row gallery-img-row">
                                @foreach ($set->products as $item)
                                    <div class="col-xs-2 gallery-img-col">
                                        <img src="{{ asset("uploads/products/$item->thumbnail") }}" alt="hình ảnh" onclick="openGalleryImg(this);">
                                        <div class="txt-center"><a class="cl-blue" title="Xem chi tiết" href="{{ asset("admin/product/$item->id/$item->name") }}">{{ $item->name }}</a></div>
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