@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Giao diện website <small> Tùy chỉnh</small></h3>
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

                        @if(session('alert-danger'))
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('alert-danger')}}
                            </div>
                        @endif

                        <form class="form-horizontal form-label-left"
                                action="{{ asset('admin/theme-setting') }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">Logo</label>
                                <div class="col-md-6 col-xs-12 theme-setting-input">
                                    <img class="img-responsive theme-setting-img" src="{{ asset("uploads/theme/$theme->logo") }}" alt="hình ảnh">
                                    <input
                                            name="logo" 
                                            type="file" 
                                            class="file"
                                            data-show-upload="true" 
                                            data-show-caption="true">
    
                                    <span class="input-suggestion">Kích thước yêu cầu 244 x 39 px</span>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20 font-size-20">Banner trang chủ</label>
                                <div class="col-md-6 col-xs-12 theme-setting-input">

                                    @foreach ($home_banners as $item)
                                        @if (!empty($item))
                                            <div class="col-xs-12 pl-0">
                                                <label class="image-checkbox">
                                                    <img class="img-responsive" src="{{ asset("uploads/theme/$item") }}" alt="hình ảnh">
                                                    <input
                                                        name="old_home_banners[]"
                                                        value="{{ $item }}"
                                                        checked
                                                        type="checkbox">
                                                    <i class="fa fa-check hidden"></i>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach

                                    <input
                                            name="home_banners[]" 
                                            type="file" 
                                            class="file"
                                            data-show-upload="true" 
                                            data-show-caption="true"
                                            multiple>
    
                                    <span class="input-suggestion">Kích thước yêu cầu 1349 x 495 px. Thứ tự banner lựa chọn là thứ tự xuất hiện trên trang chủ. Tối đa 5 hình ảnh.</span>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">Banner các trang sản phẩm</label>
                                <div class="col-md-6 col-xs-12 theme-setting-input">
                                    @foreach ($prod_banners as $item)
                                        @if (!empty($item))
                                            <div class="col-xs-12 pl-0">
                                                <label class="image-checkbox">
                                                    <img class="img-responsive" src="{{ asset("uploads/theme/$item") }}" alt="hình ảnh">
                                                    <input
                                                        name="old_prod_banners[]"
                                                        value="{{ $item }}"
                                                        checked
                                                        type="checkbox">
                                                    <i class="fa fa-check hidden"></i>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach

                                    <input
                                            name="prod_banners[]" 
                                            type="file" 
                                            class="file"
                                            data-show-upload="true" 
                                            data-show-caption="true"
                                            multiple>
    
                                    <span class="input-suggestion">Kích thước yêu cầu 1349 x 299 px. Lưu ý: Thứ tự các banner: Áo, Quần, Váy, Bộ, Phụ Kiện.</span>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20"> Banner trang Về chúng tôi</label>
                                <div class="col-md-6 col-xs-12 theme-setting-input">
                                    <img class="img-responsive theme-setting-img" src="{{ asset("uploads/theme/$theme->about_banner") }}" alt="hình ảnh">
                                    <input
                                            name="about_banner" 
                                            type="file" 
                                            class="file"
                                            data-show-upload="true" 
                                            data-show-caption="true">
    
                                    <span class="input-suggestion">Kích thước yêu cầu 1349 x 299 px</span>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">* Email liên hệ</label>
                                <div class="col-md-6 col-xs-12">
                                    <input
                                            name="contact_email" 
                                            type="email" 
                                            class="form-control"
                                            required
                                            value="{{ $theme->contact_email }}"
                                            placeholder="Nhập email liên hệ">
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">* Số điện thoại</label>
                                <div class="col-md-6 col-xs-12">
                                    <div id="phoneInputGroup">

                                        @foreach ($contact_phones as $item)
                                            <input
                                                name="contact_phones[]" 
                                                type="text" 
                                                class="form-control"
                                                required
                                                value="{{ $item }}"
                                                placeholder="Nhập số điện thoại">
                                        @endforeach
                                        
                                    </div>
                                    <div class="d-flex-right">
                                        <a id="addPhoneRow" class="btn btn-dark btn-xs">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a id="removePhoneRow" class="btn btn-dark btn-xs">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">* Các cửa hàng</label>
                                <div class="col-md-6 col-xs-12">
                                    <div id="shopInputGroup">
                                        
                                        @foreach ($shop_addresses as $item)
                                            <input
                                                name="shop_addresses[]" 
                                                type="text" 
                                                class="form-control"
                                                required
                                                value="{{ $item }}"
                                                placeholder="Nhập địa chỉ cửa hàng">
                                        @endforeach
                                    </div>
                                    <div class="d-flex-right">
                                        <a id="addShopRow" class="btn btn-dark btn-xs">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a id="removeShopRow" class="btn btn-dark btn-xs">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">* Bài viết giới thiệu</label>
                                <div class="col-xs-12">
                                    <textarea class="form-control"
                                            id="post-editor"
                                            name="about_post" 
                                            rows="5"
                                            placeholder="Viết nội dung ..."
                                            required
                                            >{{ $theme->about_post }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12 font-size-20">* Bài viết tuyển dụng</label>
                                <div class="col-xs-12">
                                    <textarea class="form-control"
                                            id="post-editor-1"
                                            name="hire_post" 
                                            rows="5"
                                            placeholder="Viết nội dung ..."
                                            required
                                            >{{ $theme->hire_post }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
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