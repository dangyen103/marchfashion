@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="container-lf-3 px-15">
            <!-- Breadcrumb  -->
			<div class="row mt-2">
				<ul class="breadcrumb bg-tranf">
					<li><a href="{{ route('trangchu')}}">Trang chủ</a></li>
					<li>
						<span>›</span>Gợi ý cho bạn
					</li>
				</ul>
			</div>
            <!-- End Breadcrumb  -->

			<div class="row my-3">
				<div class="col-12">
					<h2 class="txt-upc text-center suggestion-title">Gợi ý cho bạn</h2>
				</div>
			</div>
			<div class="row">
				@foreach ($products as $item)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2-5 mb-30">
                        <div class="prod-card"><a href="{{ asset("san-pham/$item->id/$item->unsigned_name") }}">
                            <div class="prod-card-img">
                                <img class="img-fluid" src="{{ asset("uploads/products/$item->thumbnail") }}" width="100%" alt="hình ảnh">
                            </div>
                            <div class="prod-card-info">
                                <div class="prod-card-id">{{ str_pad($item->id, 8, '0', STR_PAD_LEFT) }}</div>
                                <div class="prod-card-price">{{ number_format($item->price, 0, ',', '.') }} ₫</div>
                            </div>

                            @if ( strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " -1 week")) <= date('Y-m-d', strtotime($item->created_at)) &&
                                date('Y-m-d', strtotime($item->created_at)) <= strftime("%Y-%m-%d", strtotime(date("Y-m-d") . " +1 week")))
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

                {{-- <div class="col-12 pagination-group">
					{{ $products->links() }}
				</div> --}}
			</div>
		</div>
		
	</div>
@endsection