<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/quicksand.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/satisfy.css') }}" rel="stylesheet"></link>
		<link href="{{ asset('frontend/fonts/nunito.css') }}" rel="stylesheet"></link>

		<title>@yield('title')</title>

		<style type="text/css">
			body
			{
				background-color: #f7b733;
			}

			h1, h2, h4
			{
				font-family: 'Satisfy';
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
				padding-top: 35px;
				padding-bottom: 35px;
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

			/*end Footer*/
		</style>

		@yield('style')

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

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
	                    <li class="nav-item {{ Route::is('frontend.about.*') ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('frontend.about') }}">
	                            About
	                        </a>
	                    </li>
	                    <li class="nav-item {{ Route::is('frontend.product.*') ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('frontend.product') }}">
	                            Products
	                        </a>
	                    </li>
	                    <li class="nav-item {{ Route::is('frontend.distribution.*') ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('frontend.distribution') }}">
	                            Distribution
	                        </a>
	                    </li>
	                    <li class="nav-item {{ Route::is('frontend.service.*') ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('frontend.service') }}">
	                            Services
	                        </a>
	                    </li>
	                    <li class="nav-item {{ Route::is('frontend.news.*') ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('frontend.news') }}">
	                            News
	                        </a>
	                    </li>
	                    <li class="nav-item {{ Route::is('frontend.contact.*') ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('frontend.contact') }}">
	                            Contact Us
	                        </a>
	                    </li>
	                </ul>

	            </div>
        	</div>
        </nav>

        @yield('content')

        <div class="footer container-fluid bootstrap" style="background-image: url({{ asset('frontend/images/bottom-hill.png') }});">
        	<h2 class="text-center mini-spacing">
        		<img src="{{ asset('frontend/images/nutragen-logo.png') }}" height="50">
        	</h2>

        	<div class="container mini-spacing">
        		<div class="row">
	        		<div class="col-md-3">
	        			<p>
	        				<b>Head Office & Logistic Warehouse</b><br/>
							Jl. Alternatif Sentul, <br/>
							RT 01/RW01 Sentul<br/>
							Babakan Madang Bogor
	        			</p>
	        		</div>
	        		<div class="col-md-3">
	        			<p>
	        				<b>Head Office & Logistic Warehouse</b><br/>
							Jl. Alternatif Sentul, <br/>
							RT 01/RW01 Sentul<br/>
							Babakan Madang Bogor
	        			</p>
	        		</div>
	        		<div class="col-md-3">
	        			<p>
	        				<table>
	        					<tr>
	        						<td><img src="{{ asset('frontend/images/phone.png') }}" height="30px"></td>
	        						<td>
	        							<p>+0000000000000</p>
	        							<p>+0000000000000</p>
		        					</td>
	        					</tr>
	        				</table>
	        			</p>
	        		</div>
	        		<div class="col-md-3">
	        			<p>
	        				<b>Follow Us</b> <br/>
							<a href="#"><img src="{{ asset('frontend/images/twitter-logo.png') }}" height="50px"></a>
							<a href="#"><img src="{{ asset('frontend/images/facebook-logo.png') }}" height="50px"></a>
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