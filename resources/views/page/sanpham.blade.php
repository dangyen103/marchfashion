@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<div class="prod-banner">
			<img class="img-fluid" src="imgs/Prod_Banner01.jpg" alt="" width="100%">
		</div>

        <div class="container-lf-3 px-15">
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
					@if (isset($type))
						<li>
							<span>›</span>
							<a href="{{ asset('san-pham') }}">Sản phẩm</a>
						</li>
						<li>
							<span>›</span>{{ $type }}
						</li>
					@else
					<li>
							<span>›</span>Sản phẩm
						</li>
					@endif
				</ul>
			</div>
			<div class="row mt-4">
				<div class="col-md-3 col-lg-2-5 left-sidebar">
					<ul id="left-nav" class="nav-list-group">
						<li class="nav-list-title">Danh mục</li>
						<li class="nav-list-item"><a href="{{ asset('san-pham') }}">Tất cả</a>
						<li class="nav-list-item"><a href="{{ asset('ao') }}">Áo</a>
							<!-- <ul class="nav-sublist-group">
								<li><a href="">Sub menu</a></li>
								<li><a href="">Sub menu</a></li>
								<li><a href="">Sub menu</a></li>
							</ul> -->
						</li>
						<li class="nav-list-item"><a href="{{ asset('quan') }}">Quần</a></li>
						<li class="nav-list-item"><a href="{{ asset('vay') }}">Váy</a></li>
						<li class="nav-list-item"><a href="{{ asset('bo') }}">Bộ</a></li>
						<li class="nav-list-item"><a href="{{ asset('phu-kien') }}">Phụ kiện</a></li>
					</ul>
				</div>
				<div class="col-md-9 col-lg-8-5">
					<div>
						<ul class="list-inline-group sort-by-group">
							<li class="list-inline-item sort-by-title">Sắp xếp theo:</li>
							<li class="list-inline-item sort-by-name">Tất cả</li>
							<li class="list-inline-item sort-by-name">Mới</li>
							<li class="list-inline-item sort-by-name">Phổ biến</li>
							<li class="list-inline-item sort-by-name">Giá tăng dần</li>
							<li class="list-inline-item sort-by-name">Giá giảm dần</li>
						</ul>
					</div>				
					<div class="row">
						@foreach ($products as $item)
							<div class="col-6 col-sm-4 col-lg-3 mb-30">
								<div class="prod-card"><a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}">
									<div class="prod-card-img">
										<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
									</div>
									<div class="prod-card-info">
										<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
										<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
									</div>
									<div class="tag-new">
										<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
									</div>
									<div class="tag-sale">
										<span class="card-sale">-40%</span>
									</div>
									<div class="card-add-to-cart">
										<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
									</div>
								</a></div>
							</div>
						@endforeach	
				</div>
			</div>
		</div>
	</div>
@endsection