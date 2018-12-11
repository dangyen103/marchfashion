@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Khuyến mại<small> Thêm mới</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset('admin/discount') }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
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
                                action="{{ asset("admin/discount/$discount->id/edit") }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Mức khuyến mại (%)</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input
                                        type="number"
                                        min="0"
                                        max="100"
                                        class="form-control" 
                                        value="{{ $discount->discountValue }}"
                                        placeholder="Nhập mức khuyến mại"
                                        name="discountValue">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Thời gian bắt đầu</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input
                                        type="datetime-local"
                                        value="{{ date('Y-m-d\TH:i', strtotime($discount->start_time)) }}"
                                        class="form-control" 
                                        placeholder="Nhập thời gian bắt đầu"
                                        name="start_time">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">* Thời gian kết thúc</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input
                                        type="datetime-local"
                                        class="form-control" 
                                        value="{{ date('Y-m-d\TH:i', strtotime($discount->finish_time)) }}"
                                        placeholder="Nhập thời gian kết thúc"
                                        name="finish_time">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea
                                        rows="2"
                                        class="form-control" 
                                        placeholder="Nhập mô tả"
                                        name="description">{{ $discount->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sản phẩm khuyến mại</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="table-reponsive">
                                        <table id="detailProdTable" class="table table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>        
                                                    <th class="txt-center" style="width: 20%">ID</th>
                                                    <th class="txt-center" style="width: 60%">Tên</th>
                                                    <th class="txt-center" style="width: 20%">Checked</th>
                                                </tr>
                                            </thead>
                                            <tbody class="prod-detail-form">
                                                @foreach ($discount->products as $item)
                                                    <tr>
                                                        <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                        <td class="txt-center">{{ $item->name }}</td>
                                                            
                                                        <td>
                                                            <input class="form-control check-box-control"
                                                                    name="products[]" 
                                                                    value="{{ $item->id }}"
                                                                    checked
                                                                    type="checkbox">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="mt-1 font-normal">Thêm sản phẩm khuyến mại</label>
                                    <select class="select-multiple form-control" 
                                            name="products[]" 
                                            multiple="multiple"
                                            required>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a href="{{ asset('admin/discount') }}" class="btn btn-danger">Hủy</a>
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