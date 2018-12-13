@extends('admin.layouts.index')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Bài đăng <small> Viết bài mới</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="d-flex-right">
                        <a href="{{ asset("admin/post") }}" class="btn btn-dark"><i class="fa fa-reply"></i></a>
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
                                action="{{ asset("admin/post/$post->id/$post->unsigned_title/edit") }}" 
                                method="POST"
                                enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label class="col-xs-12">* Tiêu đề</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" 
                                        class="form-control"
                                        value="{{ $post->title }}" 
                                        placeholder="Nhập tiêu đề"
                                        name="title"
                                        required>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12">* Ảnh đại diện</label>
                                <div class="col-md-6 col-xs-12">
                                    <img class="prod-thumbnail" src="{{ asset("uploads/posts/$post->image") }}" alt="hình ảnh">
                                    <input
                                            name="thumbnail" 
                                            type="file" 
                                            class="file"
                                            data-show-upload="true" 
                                            data-show-caption="true">
    
                                    <span class="input-suggestion">Chọn ảnh đại diện khác, tỉ lệ đề xuất 4:3</span>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12">* Mô tả</label>
                                <div class="col-xs-12">
                                    <textarea type="text" 
                                        class="form-control" 
                                        rows="2"
                                        placeholder="Nhập mô tả"
                                        name="description"
                                        required>{{ $post->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xs-12">* Nội dung</label>
                                <div class="col-xs-12">
                                    <textarea class="form-control"
                                            id="post-editor"
                                            name="content" 
                                            rows="5"
                                            placeholder="Viết nội dung ..."
                                            >{{ $post->content }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <a href="{{ asset("admin/post") }}" class="btn btn-danger">Hủy</a>
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