@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sản phẩm <small> Chỉnh sửa sản phẩm</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ URL::previous() }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
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
                                action="{{ asset("admin/product/$product->id/$product->name/edit") }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Tên sản phẩm</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" 
                                        class="form-control" 
                                        placeholder="Nhập tên sản phẩm"
                                        name="name"
                                        value="{{ $product->name }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Loại</label>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <select class="form-control" 
                                            name="category" required>
                                            <optgroup label="Áo">
                                                @foreach ($cates as $item)
                                                    @if ($item->type == 0)
                                                        <option value="{{ $item->id }}"
                                                            @if ($product->category->id == $item->id)
                                                                selected
                                                            @endif
                                                        >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Quần">
                                                @foreach ($cates as $item)
                                                    @if ($item->type == 1)
                                                        <option value="{{ $item->id }}"
                                                             @if ($product->category->id == $item->id)
                                                                selected
                                                            @endif
                                                        >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Váy">
                                                @foreach ($cates as $item)
                                                    @if ($item->type == 2)
                                                        <option value="{{ $item->id }}"
                                                             @if ($product->category->id == $item->id)
                                                                selected
                                                            @endif
                                                        >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Bộ">
                                                @foreach ($cates as $item)
                                                    @if ($item->type == 3)
                                                        <option value="{{ $item->id }}"
                                                             @if ($product->category->id == $item->id)
                                                                selected
                                                            @endif
                                                        >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Phụ kiện">
                                                @foreach ($cates as $item)
                                                    @if ($item->type == 4)
                                                        <option value="{{ $item->id }}"
                                                             @if ($product->category->id == $item->id)
                                                                selected
                                                            @endif
                                                        >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Giá</label>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <input type="number" 
                                        min="0"
                                        class="form-control" 
                                        placeholder="Nhập giá"
                                        name="price"
                                        value="{{ $product->price }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" 
                                        class="form-control" 
                                        rows="4" 
                                        placeholder="Nhập mô tả"
                                        name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhãn</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" 
                                        class="form-control" 
                                        placeholder="Nhập các nhãn liên quan"
                                        name="label">{{ $product->label }}</textarea>
                                    <span class="input-suggestion">eg. Mùa xuân, Mùa hè, Mùa thu, Mùa đông,
                                    Classic, Bohemian, Preppy, Surfer Chic, Fashionista, Suburbanite...</span>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img class="prod-thumbnail" src="{{ asset("uploads/products/$product->thumbnail") }}" alt="hình ảnh">
                                    <input
                                            name="thumbnail" 
                                            type="file" 
                                            class="file"
                                            data-show-upload="true" 
                                            data-show-caption="true">
    
                                    <span class="input-suggestion">Chọn ảnh đại diện khác, tỉ lệ đề xuất 2:3</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đã tải lên</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @foreach ($product->images as $item)
                                        <div class="col-md-3 col-sm-3 col-xs-4 pl-0">
                                            <label class="image-checkbox">
                                                <img class="img-responsive" src="{{ asset("uploads/products/$item->image") }}" alt="hình ảnh">
                                                <input
                                                    name="old_images[]"
                                                    value="{{ $item->id }}"
                                                    checked
                                                    type="checkbox">
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                    <div>
                                        <span class="input-suggestion">(Bỏ chọn nếu muốn xóa ảnh)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input
                                            name="new_images[]" 
                                            type="file" 
                                            class="file"
                                            multiple
                                            data-show-upload="true" 
                                            data-show-caption="true">
    
                                    <span class="input-suggestion">Tải thêm hình ảnh, tỉ lệ đề xuất 2:3</span>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Chi tiết</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="table-reponsive">
                                        <table id="detailProdTable" class="table table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>        
                                                <th style="width: 40%">Kích thước</th>
                                                <th style="width: 40%">Màu sắc</th>
                                                <th style="width: 20%">Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody class="prod-detail-form">
                                                @foreach ($product->product_details as $item)
                                                    <tr>
                                                        <td>
                                                            <select name="size[]" 
                                                                    id="size"
                                                                    class="form-control"
                                                                    required>
                                                                    <option value="Freesize"
                                                                        @if ($item->size == 'Freesize')
                                                                            selected
                                                                        @endif
                                                                    >Freesize</option>
                                                                    <option value="S"
                                                                        @if ($item->size == 'S')
                                                                            selected
                                                                        @endif
                                                                    >S</option>
                                                                    <option value="M"
                                                                        @if ($item->size == 'M')
                                                                            selected
                                                                        @endif
                                                                    >M</option>
                                                                    <option value="L"
                                                                        @if ($item->size == 'L')
                                                                            selected
                                                                        @endif
                                                                    >L</option>
                                                                    <option value="XL"
                                                                        @if ($item->size == 'XL')
                                                                            selected
                                                                        @endif
                                                                    >Xl</option>
                                                                    <option value="XXL"
                                                                        @if ($item->size == 'XXL')
                                                                            selected
                                                                        @endif
                                                                    >XXL</option>
                                                                    <option value="XXXL"
                                                                        @if ($item->size == 'XXXL')
                                                                            selected
                                                                        @endif
                                                                    >XXL</option>
                                                                    <option value="35"
                                                                        @if ($item->size == '35')
                                                                            selected
                                                                        @endif
                                                                    >35</option>
                                                                    <option value="36"
                                                                        @if ($item->size == '36')
                                                                            selected
                                                                        @endif
                                                                    >36</option>
                                                                    <option value="37"
                                                                        @if ($item->size == '37')
                                                                            selected
                                                                        @endif
                                                                    >37</option>
                                                                    <option value="38"
                                                                        @if ($item->size == '38')
                                                                            selected
                                                                        @endif
                                                                    >38</option>
                                                                    <option value="39"
                                                                        @if ($item->size == '39')
                                                                            selected
                                                                        @endif
                                                                    >39</option>
                                                                    <option value="40"
                                                                        @if ($item->size == '40')
                                                                            selected
                                                                        @endif
                                                                    >40</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input id="color" 
                                                                    name="color[]"
                                                                    class="form-control"
                                                                    required
                                                                    placeholder="Nhập màu sắc"
                                                                    value="{{ $item->color }}"
                                                                    type="text"></td>
                                                        <td>
                                                            <input id="quantity" 
                                                                    name="quantity[]" 
                                                                    class="form-control"
                                                                    required
                                                                    value="{{ $item->quantity }}"
                                                                    min="1"
                                                                    type="number">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex-right">
                                            <a id="addTableRow" class="btn btn-dark btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <a id="removeTableRow" class="btn btn-dark btn-xs">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a href="{{ URL::previous() }}" class="btn btn-danger">Hủy</a>
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