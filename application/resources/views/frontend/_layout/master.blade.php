<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		@yield('meta')

		<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

		<link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/quicksand.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/Roboto.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/nunito.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/roboto.css') }}" rel="stylesheet"></link>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

		<title>{{ $global_website_name->value }} - @yield('title')</title>

		<style type="text/css">
			body
			{
				background-color: #f7b733;
			}

			h1, h2, h4
			{
				font-family: 'Roboto';
				color: #42474c;
				font-size: 55px;
				margin-bottom: 0;
			}

			h3
			{
				font-family: 'Nunito';
				font-size: 25px;
				color: #fc4a1a;
				margin-bottom: 0;
			}

			h4
			{
				color: #49bcad;
				font-size: 32px;
			}

			p, a
			{
				font-family: 'Nunito';
				font-size: 14px;
				color: #42474c;
				margin-bottom: 0;
			}

			.content
			{
				padding: 0;
				margin: 0;
				padding-top: 80px;
			}

			.full
			{
				padding: 0;
				margin: 0;
			}

			.white-color
			{
				color: white;
			}

			.red-color
			{
				color: #f47e54;
			}

			.orange-color
			{
				color: #f7b733;
			}

			.white-background
			{
				background-color: white;
			}

			.clearfix::after {
				content: "";
				clear: both;
				display: table;
			}

			.button
			{
				background-color: #49bcad;
				height: 50px;
				width: 120px;
				border-radius: 25px;
				color: white;
				display: inline-block;
				text-align: center;
				line-height: 45px;
				margin-top: 20px;
				margin-bottom: 20px;
				border: none;
			}

			.form-control
			{
				border-radius: 1.25rem;
			}

			.heading-underline::after
			{

				display: table;
				width: 100px;
				height:2px;
				margin:.25em auto;
				background-color: #49bcad;
				content: '';
			}

			.heading-underline-orange::after
			{

				display: table;
				width: 100px;
				height:2px;
				margin:.25em auto;
				background-color: #ffbd66;
				content: '';
			}

			.spacing
			{
				padding-top: 75px;
			}

			.mini-spacing
			{
				padding-top: 25px;
				padding-bottom: 25px;
			}

			/*Cart Nutragen*/

			.cart-wrapper {
				position: fixed;
				left: 0;
				top: 0;
				display: table;
				z-index: 1;
			}
			.cart-wrapper .middle {
				display: table-cell;
				width: 0;
				height: 100vh;
				vertical-align: middle
			}
			.cart-wrapper .content-cart {
				position: relative;
				z-index: 1;
				transition: all .51s
			}
			.cart-wrapper .content-cart:hover {
				margin-left: 0
			}
			.cart-wrapper .content-cart .icon-cart-wrapper {
				width: 60px;
				height: 46px;
				padding: 8px 15px;
				margin-bottom: 0;
				border-radius: 0 10px 10px 0;
				background-color: #fe0;
				text-align: right;
				-webkit-animation: glow 2.5s infinite;
				-moz-animation: glow 2.5s infinite;
				animation: glow 2.5s infinite;
				animation-timing-function: ease-in-out;
				transition: all .51s
			}

			@-webkit-keyframes glow {
				0% {
					box-shadow: 0 0 0 0 transparent
				}
				50% {
					box-shadow: 0 0 15px 5px rgba(0, 0, 0, .5)
				}
				100% {
					box-shadow: 0 0 0 0 transparent
				}
			}
			@-moz-keyframes glow {
				0% {
					box-shadow: 0 0 0 0 transparent
				}
				50% {
					box-shadow: 0 0 15px 5px rgba(0, 0, 0, .5)
				}
				100% {
					box-shadow: 0 0 0 0 transparent
				}
			}
			@keyframes glow {
				0% {
					box-shadow: 0 0 0 0 transparent
				}
				50% {
					box-shadow: 0 0 15px 5px rgba(0, 0, 0, .5)
				}
				100% {
					box-shadow: 0 0 0 0 transparent
				}
			}

			.cart-wrapper .content-cart:hover .icon-cart-wrapper {
				width: 80px;
				margin-bottom: 20px
			}
			.cart-wrapper .content-cart img.icon-cart {
				height: 30px
			}
			.cart-wrapper .content-cart .cart-list {
				padding-left: 0
			}
			.cart-wrapper .content-cart:hover .cart-list {
				padding-left: 10px
			}
			.cart-wrapper .content-cart .cart-list a img {
				height: 0;
				margin-bottom: 0;
				transition: all 1s
			}
			.cart-wrapper .content-cart:hover .cart-list a img {
				height: 30px;
				margin-bottom: 10px
			}

			/*Navbar Nutragen*/
			.navbar-nutragen{
				font-family: 'Quicksand' !important;
				font-weight: bold;
				background-color: white;
				box-shadow: 0px 5px 10px gray;
			}

			.navbar-nutragen a.nav-link{
				font-family: 'Quicksand' !important;
				color: #182f7c !important;
				padding-right: 1rem !important;
				padding-left: 1rem !important;
				font-size: 17px;
			}

			.navbar-nutragen .active a.nav-link{
				font-family: 'Quicksand' !important;
				color: #f7b733 !important;
			}

			
			/*end Navbar Nutragen*/


			/*Footer*/

			.footer
			{
				margin: 0;
				padding: 0;
				background-color: #f7f6f9;
				
				background-repeat: no-repeat, repeat;
				background-size: 100%;
				background-position: bottom center;
			}

			.company-footer
			{
				
				padding: 170px 0px 30px;
			}

			@media(min-width: 992px)
			{
				.img-large
				{
					height: 250px;
				}

				.img-medium
				{
					height: 100px;
				}

				.img-small
				{
					height: 55px;
				}

				.hidden-desktop
				{
					display: none;
				}
			}
			

			@media(max-width: 991px)
			{
				h2
				{
					padding-top: 20px;
					font-size: 44px;
				}
				
				.img-large
				{
					width: 90%;
				}

				.img-medium
				{
					height: 45px;
					display: inline-block;
				    margin: 10px 0px;
				}

				.img-small
				{
					height: 40px !important;
					display: inline-block;
				    margin: 10px 0px;
				}

				.img-product
				{
				    height: auto !important;
				    width: 100%;
				}

				.img-ecommerce
				{
					height: 40px !important;
				    padding: 0px !important;
				    margin: 24px auto 0px !important;
				    display: block;
				}

				.img-certification
				{
					height: 45px !important;
				}

				.footer {
				    background-size: 194%;
				    background-position: bottom right;
				}

				.hidden-mobile
				{
					display: none;
				}

				.cart-wrapper
				{
					top: 85px;
				}
			}

			/*end Footer*/
		</style>

		@yield('style')

		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
		<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('frontend/vendor/jquery-aniview-master/dist/jquery.aniview.js') }}"></script>
		<script type="text/javascript">
			$(function() {
				var options = {
				    animateThreshold: 0,
				    scrollPollInterval: 0
				}
				$('.aniview').AniView(options);

				$('#advertisment').modal('show');

				window.setInterval(function() {
		    		var timer = $(".timer").html();
			        var countDown = eval(timer) - eval(1);

			        $(".timer").html(countDown);
			        if(countDown == 0){
			        	$("#advertisment").modal('hide');
			        }
				}, 1000);
				
			});
		</script>

		

		@yield('headscript')
	</head>
	<body>
		<nav class="bootstrap fixed-top navbar navbar-expand-lg navbar-light navbar-nutragen">
			<div class="container">
				<a class="navbar-brand" href="{{ route('frontend.home') }}"">
					<img src="{{ asset('frontend/images/nutragen-logo.png') }}" height="50" alt="Nutragen">
				</a>
				<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
					<span class="navbar-toggler-icon">
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item {{ Route::is('frontend.about*') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('frontend.about') }}">
								About
							</a>
						</li>
						<li class="nav-item {{ Route::is('frontend.product*') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('frontend.product') }}">
								Products
							</a>
						</li>
						<li class="nav-item {{ Route::is('frontend.distribution*') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('frontend.distribution') }}">
								Distribution
							</a>
						</li>
						<li class="nav-item {{ Route::is('frontend.service*') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('frontend.service') }}">
								Services
							</a>
						</li>
						<li class="nav-item {{ Route::is('frontend.news*') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('frontend.news') }}">
								News
							</a>
						</li>
						<li class="nav-item {{ Route::is('frontend.contact*') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('frontend.contact') }}">
								Contact Us
							</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>

		@if($ecommerce != '')
		<div class="cart-wrapper">
			<div class="middle">
				<div class="content-cart">
					<div class="icon-cart-wrapper hidden-mobile">
						<img class="icon-cart" src="{{ asset('frontend/images/cart.png') }}" title="Buy Now" alt="Buy Now">
					</div>
						
					@foreach($ecommerce as $list)
					<div class="cart-list">
						<a href="#">
							<img src="{{ asset($list->image_logo) }}" title="{{ $list->name }}" alt="{{ $list->name }}" height="30">
						</a>
					</div>
					@endforeach

					<div class="icon-cart-wrapper hidden-desktop">
						<img class="icon-cart" src="{{ asset('frontend/images/cart.png') }}" title="Buy Now" alt="Buy Now">
					</div>

				</div>
			</div>
		</div>
		@endif

		@if($advertisment != '')
		<div class="modal fade" id="advertisment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							Close in <span class="timer">10</span>s <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body text-center">
						<a href="{{ $advertisment->link }}">
							<img src="{{ asset($advertisment->media) }}" title="{{ $advertisment->name }}" alt="{{ $advertisment->name }}" style="width: 100%">
						</a>
					</div>
				</div>
			</div>
		</div>
		@endif

		@yield('content')

		

			<div class="footer container-fluid bootstrap" style="background-image: url({{ asset('frontend/images/bottom-hill.png') }});">
				<h2 class="text-center mini-spacing">
					<img src="{{ asset('frontend/images/nutragen-logo.png') }}" height="50">
				</h2>

				<div class="container ">
					<div class="row">
						<div class="col-md-3 mini-spacing">
							{!! $global_footer_address_1->value !!}
						</div>
						<div class="col-md-3 mini-spacing">
							{!! $global_footer_address_2->value !!}
						</div>
						<div class="col-md-3 mini-spacing">
							<table>
								<tr>
									<td><img src="{{ asset('frontend/images/phone.png') }}" height="30px"></td>
									<td>
										{!! $global_footer_phone->value !!}
									</td>
								</tr>
							</table>
						</div>
						<div class="col-md-3 mini-spacing">
							<p>
								<b>Follow Us</b> <br/>
								<a href="https://www.instagram.com/nutragenofficial/"><img src="{{ asset('frontend/images/instagram-logo.png') }}" height="45px"></a>
								<a href="https://facebook.com/nutragenofficial/"><img src="{{ asset('frontend/images/facebook-logo.png') }}" height="45px"></a>
								<a href="https://www.linkedin.com/in/nutragen-global-404849152/"><img src="{{ asset('frontend/images/linkedin-logo.png') }}" height="45px"></a><br/>

								<b>For Inquiry</b> <br/>
								{!! $global_footer_inqury->value !!}<br/>

								<b>For Export</b> <br/>
								{!! $global_footer_export->value !!}<br/>
							</p>
						</div>
					</div>
				</div>

				<div class="container-fluid company-footer text-center">
					<p class="white-color">
						© PT Nutragen Global Esana <br/>
						Web Development By <img src="{{ asset('frontend/images/amadeo-logo.png') }}" height="20">
					</p>
				</div>
			</div>
		
	</body>

	
	@yield('script')
	
</html>