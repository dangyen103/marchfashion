@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<!-- Post List -->
        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route('trangchu')}}">Trang chủ</a></li>
					<li>
						<span>›</span>Xu hướng
					</li>
				</ul>
			</div>

			<div class="row mt-2">
				@foreach ($posts as $item)
                    <div class="col-md-6 col-lg-3 mb-30">
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
                <div class="col-12 pagination-group">
					{{ $posts->links() }}
				</div>
			</div>
		</div>
		<!-- End Post List -->
		
	</div>
@endsection