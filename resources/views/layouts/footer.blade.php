    <footer>
		<div class="container-fluid bg-black dash-boder pt-5 pb-4">
			<div class="container-lf-3 px-15">
				<div class="row mx-lg-0">
					<div class="col-sm-4 pl-lg-0">
						<div class="footer-card">
							<div class="footer-title">
									Cửa hàng
							</div>
							<ul class="footer-list-group">
								@foreach ($web_shop_addresses as $item)
									<li class="footer-list-item">
										<span><img src="{{ asset("uploads/icons/Map_Icon.png") }}" alt="map-icon"></span> {{ $item }}
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="footer-card">
							<div class="footer-title">
								Liên hệ
							</div>
							<ul class="footer-list-group">

								@foreach ($web_contact_phones as $item)
									<li class="footer-list-item">
										<span><img src="{{ asset('uploads/icons/Phone_Icon.png') }}" alt="phone-icon"></span> {{ $item }}
									</li>
								@endforeach
								
								<li class="footer-list-item">
									<span><img src="{{ asset('uploads/icons/Email_Icon.png') }}" alt="mail-icon"></span> {{ $web_theme->contact_email }}
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4 pr-lg-0">
						<div class="footer-card">
							<div class="footer-title">
								Theo dõi chúng tôi
							</div>
							<ul class="footer-list-group">
								<li class="footer-list-item">
									<a href="#" class="mr-2"><i class="fab fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fab fa-instagram fa-2x"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="cut-icon">
			<img src="uploads/icons/Keo_Icon.png" alt="">	
		</div>
		<div>
			<button class="btn btn-primary" id="btn-goto-top">
				<i class="fas fa-chevron-up"></i>
			</button>
		</div>
		<div class="copyright">
			<p class="txt-copyright">© 2018 March Fashion. Design by Yen Dang.</p>
		</div>
	</footer>