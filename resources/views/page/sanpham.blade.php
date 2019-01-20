@extends('layouts.index')

@section('content')
<div class="container-fluid">

		<div class="prod-banner">
			@if (isset($type))
				@if ($type == 'Áo')
					<img class="img-fluid" src="{{ asset("uploads/theme/$web_prod_banners[0]") }}" alt="" width="100%">
				@elseif($type == 'Quần')
					<img class="img-fluid" src="{{ asset("uploads/theme/$web_prod_banners[1]") }}" alt="" width="100%">
				@elseif($type == 'Váy')
					<img class="img-fluid" src="{{ asset("uploads/theme/$web_prod_banners[2]") }}" alt="" width="100%">
				@elseif($type == 'Bộ')
					<img class="img-fluid" src="{{ asset("uploads/theme/$web_prod_banners[3]") }}" alt="" width="100%">
				@elseif($type == 'Phụ kiện')
					<img class="img-fluid" src="{{ asset("uploads/theme/$web_prod_banners[4]") }}" alt="" width="100%">
				@endif
			@else
				<img class="img-fluid" src="{{ asset("uploads/theme/$web_prod_banners[0]") }}" alt="" width="100%">
			@endif
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
						
						@if (isset($sub_type))
							<li>
								<span>›</span>
								<a href="{{ asset("$unsigned_type") }}">{{ $type }}</a>
							</li>
							<li>
								<span>›</span>{{ $sub_type }}
							</li>
						@else
							<li>
								<span>›</span>{{ $type }}
							</li>
						@endif
					@else
					<li>
							<span>›</span>Sản phẩm
						</li>
					@endif
				</ul>
			</div>
			<div class="row mt-4">
				<div id="prodMenu" class="col-md-3 col-lg-2-5 left-sidebar">
					<ul id="left-nav" class="nav-list-group">
						<li class="nav-list-title">Danh mục</li>

						@if (!isset($type))
							<li class="nav-list-item"><a class="active" href="{{ asset('san-pham') }}">Tất cả</a>
							<li class="nav-list-item"><a href="{{ asset('ao') }}">Áo</a>
								<span class="fa fa-chevron-down fa-sm text-right" v-if="isTopNone == 'none'" v-on:click="showTopMenu"></span>
								<span class="fa fa-chevron-up fa-sm text-right" v-if="isTopNone == 'block'" v-on:click="showTopMenu"></span>
								<ul class="nav-sublist-group" :style="{display: isTopNone}">
									@foreach ($categories as $item)
										@if($item->type == 0)
											<li><a href="{{ asset("ao/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li class="nav-list-item"><a href="{{ asset('quan') }}">Quần</a>
								<span class="fa fa-chevron-down fa-sm text-right" v-if="isPantsNone == 'none'" v-on:click="showPantsMenu"></span>
								<span class="fa fa-chevron-up fa-sm text-right" v-if="isPantsNone == 'block'" v-on:click="showPantsMenu"></span>
								<ul class="nav-sublist-group" :style="{display: isPantsNone}">
									@foreach ($categories as $item)
										@if($item->type == 1)
											<li><a href="{{ asset("quan/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li class="nav-list-item"><a href="{{ asset('vay') }}">Váy</a>
								<span class="fa fa-chevron-down fa-sm text-right" v-if="isDressNone == 'none'" v-on:click="showDressMenu"></span>
								<span class="fa fa-chevron-up fa-sm text-right" v-if="isDressNone == 'block'" v-on:click="showDressMenu"></span>
								<ul class="nav-sublist-group" :style="{display: isDressNone}">
									@foreach ($categories as $item)
										@if($item->type == 2)
											<li><a href="{{ asset("vay/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li class="nav-list-item"><a href="{{ asset('bo') }}">Bộ</a>
								<span class="fa fa-chevron-down fa-sm text-right" v-if="isSetNone == 'none'" v-on:click="showSetMenu"></span>
								<span class="fa fa-chevron-up fa-sm text-right" v-if="isSetNone == 'block'" v-on:click="showSetMenu"></span>
								<ul class="nav-sublist-group" :style="{display: isSetNone}">
									@foreach ($categories as $item)
										@if($item->type == 3)
											<li><a href="{{ asset("bo/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li class="nav-list-item"><a href="{{ asset('phu-kien') }}">Phụ kiện</a>
								<span class="fa fa-chevron-down fa-sm text-right" v-if="isAccessNone == 'none'" v-on:click="showAccessMenu"></span>
								<span class="fa fa-chevron-up fa-sm text-right" v-if="isAccessNone == 'block'" v-on:click="showAccessMenu"></span>
								<ul class="nav-sublist-group" :style="{display: isAccessNone}">
									@foreach ($categories as $item)
										@if($item->type == 4)
											<li><a href="{{ asset("phu-kien/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
						@else
							@if ($type == 'Áo')
								<li class="nav-list-item"><a href="{{ asset('san-pham') }}">Tất cả</a>
								<li class="nav-list-item"><a class="active" href="{{ asset('ao') }}">Áo</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isTopNone == 'none'" v-on:click="showTopMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isTopNone == 'block'" v-on:click="showTopMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isTopNone}">
										@foreach ($categories as $item)
											@if($item->type == 0)
												<li><a href="{{ asset("ao/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('quan') }}">Quần</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isPantsNone == 'none'" v-on:click="showPantsMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isPantsNone == 'block'" v-on:click="showPantsMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isPantsNone}">
										@foreach ($categories as $item)
											@if($item->type == 1)
												<li><a href="{{ asset("quan/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('vay') }}">Váy</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isDressNone == 'none'" v-on:click="showDressMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isDressNone == 'block'" v-on:click="showDressMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isDressNone}">
										@foreach ($categories as $item)
											@if($item->type == 2)
												<li><a href="{{ asset("vay/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('bo') }}">Bộ</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isSetNone == 'none'" v-on:click="showSetMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isSetNone == 'block'" v-on:click="showSetMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isSetNone}">
										@foreach ($categories as $item)
											@if($item->type == 3)
												<li><a href="{{ asset("bo/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('phu-kien') }}">Phụ kiện</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isAccessNone == 'none'" v-on:click="showAccessMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isAccessNone == 'block'" v-on:click="showAccessMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isAccessNone}">
										@foreach ($categories as $item)
											@if($item->type == 4)
												<li><a href="{{ asset("phu-kien/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
							@elseif($type == 'Quần')
								<li class="nav-list-item"><a href="{{ asset('san-pham') }}">Tất cả</a>
								<li class="nav-list-item"><a href="{{ asset('ao') }}">Áo</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isTopNone == 'none'" v-on:click="showTopMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isTopNone == 'block'" v-on:click="showTopMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isTopNone}">
										@foreach ($categories as $item)
											@if($item->type == 0)
												<li><a href="{{ asset("ao/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a class="active" href="{{ asset('quan') }}">Quần</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isPantsNone == 'none'" v-on:click="showPantsMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isPantsNone == 'block'" v-on:click="showPantsMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isPantsNone}">
										@foreach ($categories as $item)
											@if($item->type == 1)
												<li><a href="{{ asset("quan/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('vay') }}">Váy</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isDressNone == 'none'" v-on:click="showDressMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isDressNone == 'block'" v-on:click="showDressMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isDressNone}">
										@foreach ($categories as $item)
											@if($item->type == 2)
												<li><a href="{{ asset("vay/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('bo') }}">Bộ</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isSetNone == 'none'" v-on:click="showSetMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isSetNone == 'block'" v-on:click="showSetMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isSetNone}">
										@foreach ($categories as $item)
											@if($item->type == 3)
												<li><a href="{{ asset("bo/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('phu-kien') }}">Phụ kiện</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isAccessNone == 'none'" v-on:click="showAccessMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isAccessNone == 'block'" v-on:click="showAccessMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isAccessNone}">
										@foreach ($categories as $item)
											@if($item->type == 4)
												<li><a href="{{ asset("phu-kien/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
							@elseif($type == 'Váy')
								<li class="nav-list-item"><a href="{{ asset('san-pham') }}">Tất cả</a>
								<li class="nav-list-item"><a href="{{ asset('ao') }}">Áo</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isTopNone == 'none'" v-on:click="showTopMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isTopNone == 'block'" v-on:click="showTopMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isTopNone}">
										@foreach ($categories as $item)
											@if($item->type == 0)
												<li><a href="{{ asset("ao/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('quan') }}">Quần</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isPantsNone == 'none'" v-on:click="showPantsMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isPantsNone == 'block'" v-on:click="showPantsMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isPantsNone}">
										@foreach ($categories as $item)
											@if($item->type == 1)
												<li><a href="{{ asset("quan/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a class="active" href="{{ asset('vay') }}">Váy</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isDressNone == 'none'" v-on:click="showDressMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isDressNone == 'block'" v-on:click="showDressMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isDressNone}">
										@foreach ($categories as $item)
											@if($item->type == 2)
												<li><a href="{{ asset("vay/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('bo') }}">Bộ</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isSetNone == 'none'" v-on:click="showSetMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isSetNone == 'block'" v-on:click="showSetMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isSetNone}">
										@foreach ($categories as $item)
											@if($item->type == 3)
												<li><a href="{{ asset("bo/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('phu-kien') }}">Phụ kiện</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isAccessNone == 'none'" v-on:click="showAccessMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isAccessNone == 'block'" v-on:click="showAccessMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isAccessNone}">
										@foreach ($categories as $item)
											@if($item->type == 4)
												<li><a href="{{ asset("phu-kien/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
							@elseif($type == 'Bộ')
								<li class="nav-list-item"><a href="{{ asset('san-pham') }}">Tất cả</a>
								<li class="nav-list-item"><a href="{{ asset('ao') }}">Áo</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isTopNone == 'none'" v-on:click="showTopMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isTopNone == 'block'" v-on:click="showTopMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isTopNone}">
										@foreach ($categories as $item)
											@if($item->type == 0)
												<li><a href="{{ asset("ao/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('quan') }}">Quần</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isPantsNone == 'none'" v-on:click="showPantsMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isPantsNone == 'block'" v-on:click="showPantsMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isPantsNone}">
										@foreach ($categories as $item)
											@if($item->type == 1)
												<li><a href="{{ asset("quan/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('vay') }}">Váy</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isDressNone == 'none'" v-on:click="showDressMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isDressNone == 'block'" v-on:click="showDressMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isDressNone}">
										@foreach ($categories as $item)
											@if($item->type == 2)
												<li><a href="{{ asset("vay/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a class="active" href="{{ asset('bo') }}">Bộ</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isSetNone == 'none'" v-on:click="showSetMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isSetNone == 'block'" v-on:click="showSetMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isSetNone}">
										@foreach ($categories as $item)
											@if($item->type == 3)
												<li><a href="{{ asset("bo/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('phu-kien') }}">Phụ kiện</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isAccessNone == 'none'" v-on:click="showAccessMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isAccessNone == 'block'" v-on:click="showAccessMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isAccessNone}">
										@foreach ($categories as $item)
											@if($item->type == 4)
												<li><a href="{{ asset("phu-kien/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
							@elseif($type == 'Phụ kiện')
								<li class="nav-list-item"><a href="{{ asset('san-pham') }}">Tất cả</a>
								<li class="nav-list-item"><a href="{{ asset('ao') }}">Áo</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isTopNone == 'none'" v-on:click="showTopMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isTopNone == 'block'" v-on:click="showTopMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isTopNone}">
										@foreach ($categories as $item)
											@if($item->type == 0)
												<li><a href="{{ asset("ao/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('quan') }}">Quần</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isPantsNone == 'none'" v-on:click="showPantsMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isPantsNone == 'block'" v-on:click="showPantsMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isPantsNone}">
										@foreach ($categories as $item)
											@if($item->type == 1)
												<li><a href="{{ asset("quan/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('vay') }}">Váy</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isDressNone == 'none'" v-on:click="showDressMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isDressNone == 'block'" v-on:click="showDressMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isDressNone}">
										@foreach ($categories as $item)
											@if($item->type == 2)
												<li><a href="{{ asset("vay/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a href="{{ asset('bo') }}">Bộ</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isSetNone == 'none'" v-on:click="showSetMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isSetNone == 'block'" v-on:click="showSetMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isSetNone}">
										@foreach ($categories as $item)
											@if($item->type == 3)
												<li><a href="{{ asset("bo/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
								<li class="nav-list-item"><a class="active" href="{{ asset('phu-kien') }}">Phụ kiện</a>
									<span class="fa fa-chevron-down fa-sm text-right" v-if="isAccessNone == 'none'" v-on:click="showAccessMenu"></span>
									<span class="fa fa-chevron-up fa-sm text-right" v-if="isAccessNone == 'block'" v-on:click="showAccessMenu"></span>
									<ul class="nav-sublist-group" :style="{display: isAccessNone}">
										@foreach ($categories as $item)
											@if($item->type == 4)
												<li><a href="{{ asset("phu-kien/$item->id/$item->unsigned_name") }}">{{ $item->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</li>
							@endif
						@endif
		
					</ul>
				</div>
				<div class="col-md-12 col-lg-8-5">
					<div>
						<ul class="nav nav-tabs list-inline-group sort-by-group">
							<li class="nav-item list-inline-item sort-by-title">
								<a class="nav-link">Sắp xếp theo:</a>
							</li>
							<li class="nav-item list-inline-item sort-by-name">
								<a class="nav-link active" data-toggle="tab" href="#prodAll">Tất cả</a>
							</li>
							<li class="nav-item list-inline-item sort-by-name">
								<a class="nav-link" data-toggle="tab" href="#prodNew">Mới</a>
							</li>
							<li class="nav-item list-inline-item sort-by-name">
								<a class="nav-link" data-toggle="tab" href="#prodFeature">Nổi bật</a>
							</li>
							<li class="nav-item list-inline-item sort-by-name">
								<a class="nav-link" data-toggle="tab" href="#prodPriceAsc">Giá tăng dần</a>
							</li>
							<li class="nav-item list-inline-item sort-by-name">
								<a class="nav-link" data-toggle="tab" href="#prodPriceDesc">Giá giảm dần</a>
							</li>
						</ul>
					</div>				
					<div class="tab-content">
						<div class="row tab-pane active" id="prodAll">
							@if (count($products) > 0)
								@foreach ($products as $item)
								<div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-30">
									<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
										<div class="prod-card-img">
											<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
										</div>
										<div class="prod-card-info">
											<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
											<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
										</div>

										@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
											<div class="tag-new">
												<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
											</div>	
										@endif

										@foreach ($item->discounts as $item_discount)
											@if (date('Y-m-d H:i:s', strtotime($item_discount->start_time)) <= date('Y-m-d H:i:s') 
												&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($item_discount->finish_time)))
												<div class="tag-sale">
													<span class="card-sale">-{{ $item_discount->discountValue  }}%</span>
												</div>
											@endif
										@endforeach

										<div class="card-add-to-cart">
											<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
										</div>
									</a></div>
								</div>
							@endforeach	

							<div class="col-12 pagination-group">
								{{ $products->links() }}
							</div>
							@else
								<div class="col-12 text-center">Không có sản phẩm nào.</div>
							@endif
						</div>
						<div class="row tab-pane fade" id="prodNew">
							@if (count($new_products) > 0)
								@foreach ($new_products as $item)
									<div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-30">
										<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
											<div class="prod-card-img">
												<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
											</div>
											<div class="prod-card-info">
												<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
												<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
											</div>
		
											@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
												<div class="tag-new">
													<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
												</div>	
											@endif
		
											@foreach ($item->discounts as $item_discount)
												@if (date('Y-m-d H:i:s', strtotime($item_discount->start_time)) <= date('Y-m-d H:i:s') 
													&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($item_discount->finish_time)))
													<div class="tag-sale">
														<span class="card-sale">-{{ $item_discount->discountValue  }}%</span>
													</div>
												@endif
											@endforeach
		
											<div class="card-add-to-cart">
												<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
											</div>
										</a></div>
									</div>
								@endforeach	
		
								<div class="col-12 pagination-group">
									{{ $new_products->links() }}
								</div>	
							@else
								<div class="col-12 text-center">Không có sản phẩm nào.</div>
							@endif
						</div>
						<div class="row tab-pane fade" id="prodFeature">
							@if (count($feature_products) > 0)
								@foreach ($feature_products as $item)
								<div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-30">
									<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
										<div class="prod-card-img">
											<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
										</div>
										<div class="prod-card-info">
											<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
											<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
										</div>

										@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
											<div class="tag-new">
												<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
											</div>	
										@endif

										@foreach ($item->discounts as $item_discount)
											@if (date('Y-m-d H:i:s', strtotime($item_discount->start_time)) <= date('Y-m-d H:i:s') 
												&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($item_discount->finish_time)))
												<div class="tag-sale">
													<span class="card-sale">-{{ $item_discount->discountValue  }}%</span>
												</div>
											@endif
										@endforeach

										<div class="card-add-to-cart">
											<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
										</div>
									</a></div>
								</div>
							@endforeach	

							<div class="col-12 pagination-group">
								{{ $feature_products->links() }}
							</div>
							@else
								<div class="col-12 text-center">Không có sản phẩm nào.</div>
							@endif
						</div>
						<div class="row tab-pane fade" id="prodPriceAsc">
							@if (count($price_asc_products) > 0)
								@foreach ($price_asc_products as $item)
								<div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-30">
									<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
										<div class="prod-card-img">
											<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
										</div>
										<div class="prod-card-info">
											<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
											<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
										</div>

										@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
											<div class="tag-new">
												<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
											</div>	
										@endif

										@foreach ($item->discounts as $item_discount)
											@if (date('Y-m-d H:i:s', strtotime($item_discount->start_time)) <= date('Y-m-d H:i:s') 
												&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($item_discount->finish_time)))
												<div class="tag-sale">
													<span class="card-sale">-{{ $item_discount->discountValue  }}%</span>
												</div>
											@endif
										@endforeach

										<div class="card-add-to-cart">
											<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
										</div>
									</a></div>
								</div>
							@endforeach	

							<div class="col-12 pagination-group">
								{{ $price_asc_products->links() }}
							</div>
							@else
								<div class="col-12 text-center">Không có sản phẩm nào.</div>
							@endif
						</div>
						<div class="row tab-pane fade" id="prodPriceDesc">
							@if (count($price_desc_products) > 0)
								@foreach ($price_desc_products as $item)
								<div class="col-6 col-sm-4 col-md-3 col-lg-3 mb-30">
									<div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}" title="{{$item->name}}">
										<div class="prod-card-img">
											<img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
										</div>
										<div class="prod-card-info">
											<div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
											<div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
										</div>

										@if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -2 week")) <= date('Y-m-d', strtotime($item->created_at)))
											<div class="tag-new">
												<img src="{{ asset("uploads/icons/New_Icon.png") }}" alt="icon">
											</div>	
										@endif

										@foreach ($item->discounts as $item_discount)
											@if (date('Y-m-d H:i:s', strtotime($item_discount->start_time)) <= date('Y-m-d H:i:s') 
												&& date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($item_discount->finish_time)))
												<div class="tag-sale">
													<span class="card-sale">-{{ $item_discount->discountValue  }}%</span>
												</div>
											@endif
										@endforeach

										<div class="card-add-to-cart">
											<button class="btn btn-info add-cart-alert">Thêm vào giỏ <i class="fas fa-cart-arrow-down"></i></button>
										</div>
									</a></div>
								</div>
							@endforeach	

							<div class="col-12 pagination-group">
								{{ $price_desc_products->links() }}
							</div>
							@else
								<div class="col-12 text-center">Không có sản phẩm nào.</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection