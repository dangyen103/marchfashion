@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<!-- Post Detail-->
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="#">Trang chủ</a></li>
					<li>
						<span>›</span><a href="{{ asset('xu-huong') }}">Xu hướng</a>
                    </li>
                    <li>
						<span>›</span>{{ $post->title }}
					</li>
				</ul>
			</div>

			<div class="row mt-2 mb-4 post-detail px-2 py-4">
				<div class="col-12 post-detail-title">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="col-12 post-detail-content">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
		</div>
        <!-- End Post Detail -->
        
        <!-- Other Post -->
        <div class="container-lf-3 px-15">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">Bài viết khác</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($other_posts as $item)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="post-card">
                            <div class="post-card-img">
                                <img src="{{ asset("uploads/posts/$item->image") }}" alt="hình ảnh" width="100%">
                            </div>
                            <div class="post-card-info">
                                <a href="{{ asset("xu-huong/$item->id/$item->unsigned_title") }}"><h4 class="post-card-title">{{ $item->title }}</h4></a>
                                <p class="post-card-description">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Other Post -->
		
	</div>
@endsection