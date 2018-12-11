@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Khuyến mại <small> Thông tin chi tiết</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/discount") }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
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
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Mức khuyến mại:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $discount->discountValue }} %
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Thời gian bắt đầu:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $discount->start_time }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Thời gian kết thúc:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $discount->finish_time }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Thời gian kết thúc:
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label font-normal">
                                        {{ $discount->description }}
                                    </label>
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Sản phẩm khuyến mại:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="table-reponsive">
                                        <table id="detailProdTable" class="table table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>        
                                                    <th class="txt-center" style="width: 20%">ID</th>
                                                    <th class="txt-center" style="width: 60%">Tên</th>
                                                </tr>
                                            </thead>
                                            <tbody class="prod-detail-form">
                                                @foreach ($discount->products as $item)
                                                    <tr>
                                                        <td class="txt-center">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</td>
                                                        <td class="txt-center">{{ $item->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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