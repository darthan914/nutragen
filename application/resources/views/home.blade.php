<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"></link>
        <link href="{{ asset('frontend/fonts/quicksand.css') }}" rel="stylesheet"></link>
        <link href="{{ asset('frontend/fonts/satisfy.css') }}" rel="stylesheet"></link>
        <link href="{{ asset('frontend/fonts/nunito.css') }}" rel="stylesheet"></link>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <title>Nutragen - Home</title>
        <style type="text/css">
        	body
        	{
        		background-color: #f7b733;
        	}

        	h2
        	{
        		font-family: 'Satisfy';
        		font-size: 55px;
        		margin-bottom: 0;
        	}

        	h3
        	{
        		font-size: 25px;
        		color: #fc4a1a;
        		margin-bottom: 0;
        	}

        	p, a
        	{
        		font-family: 'Nunito';
        		font-size: 14px;
        		color: #42474c;
        		margin-bottom: 0;
        	}

        	.white-color
        	{
        		color: white;
        	}

        	.red-color
        	{
        		color: #f47e54;
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
        	}

        	/*Navbar Nutragen*/
        	.navbar-nutragen{
        		font-family: 'Quicksand';
        		font-weight: bold;
        		background-color: white;
        		box-shadow: 0px 5px 10px gray;
        	}

        	.navbar-nutragen a.nav-link{
        		color: #182f7c !important;
        		padding-right: 1rem !important;
			    padding-left: 1rem !important;
        	}
        	/*end Navbar Nutragen*/

        	/*Main Company*/
        	.main
        	{
        		
        		padding-top: 80px;
        		position: relative;
    		    
        	}

        	.wheat
        	{
        		background-color: #f7b733;
    		    position: absolute;
			    top: 0px;
			    background-image: url(frontend/images/white-wheat-diagonal.png);
			    background-repeat: no-repeat, repeat;
			    background-size: 113%;
			    background-position: center center;
			    height: 1160px;
			    width: 100%;
			    z-index: -1;
        	}

        	.main .box
        	{
			    margin: 10px 105px;
			    padding: 10px;
        	}

        	.main .translate-up
        	{
        		position: relative;
			    top: -45px;
        	}

        	.main .logo
        	{
        		text-align: right;
    		    margin-right: 20px;
        	}

        	

        	p.quote
        	{
        		color : #49bcad; 
        		font-style: italic; 
        		font-weight: bold; 
        		font-size: 20px;
        	}

        	img.quote
        	{
        		height: 30px;
        		display: inline-block;
        		position: relative;
        	}

        	img.quote.start{
    		    top: -10px;
        	}


        	img.quote.end{
    		    top: 10px;
        	}
        	/*End Main Company*/

        	/*Principles*/

        	.principles{
        		padding-top: 70px;
        	}

        	.principles .path-dots{
        		background-image: url(frontend/images/fresh-dots.png);
			    background-repeat: no-repeat, repeat;
			    background-size: 670px;
			    background-position: center center;
			    text-align: center;
			    height: 100px;
		        margin-top: 80px;
			    margin-bottom: 80px;
        	}

        	.principles .path-dots div.circle{
        		display: inline-block;
    		    width: 160px;
        	}

        	.principles .path-dots img.circle{
        		height: 60px;
        		-webkit-filter: drop-shadow(8px 8px 10px black);
        		filter: drop-shadow(8px 8px 10px black);
        	}

        	div.circle
        	{
        		text-align: center;
        	}

        	div.circle p
        	{
    		    margin-top: 50px;
			    text-align: center;
			    color: white;
			    font-weight: 800;
			    font-size: 17px;
        	}

        	.principles .path-dots img.circle.f{
        		position: relative;
        		top: 24px;
        	}

        	.principles .path-dots img.circle.r{
        		position: relative;
        		top: 11px;
        	}

        	.principles .path-dots img.circle.e{
        		position: relative;
        		top: 36px;
        	}

        	.principles .path-dots img.circle.s{
        		position: relative;
        		top: 6px;
        	}

        	.principles .path-dots img.circle.h{
        		position: relative;
        		top: 19px;
        	}

        	/*end Principles*/

        	/*Distribution*/
        	.distribution
        	{
        		padding-top: 50px;
        	}

        	
        	/*end Distribution*/

        	/*Certification*/
        	.certification p > img
        	{
        		padding: 0px 30px;
        	}
        	/*end Certification*/

        	/*What We Do*/
        	.what-we-do .symbol
        	{
        		height: 50px;
        	}
        	/*end What We Do*/

        	.breakpoint
        	{
        		background-color: white;
        		margin: 0;
        		padding: 0;
        	}

        	/*Product*/
        	.product
        	{
        		margin: 0;
        		padding: 0;
        		background-color: white;
        		background-image: url(frontend/images/diagonal-gray.png);
			    background-repeat: no-repeat, repeat;
			    background-size: 100% 100%;
			    background-position: bottom right;
        	}

        	.product .logo .name
        	{
        		height: 100px;
        	}

        	.product .logo .shadow
        	{
        		width: 100px;
        	}
        	/*end Product*/

        	/*Partner*/
        	.partners
        	{
        		margin: 0;
        		padding: 0;
        		background-color: white;
        	}


        	.partners p > img
        	{
        		
        		padding: 30px 30px;
        	}
        	/*end Partner*/

        	/*Footer*/

        	.footer
        	{
        		margin: 0;
        		padding: 0;
        		background-color: #f7f6f9;
        		background-image: url(frontend/images/bottom-hill.png);
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
    </head>
    <body>

        <nav class="bootstrap fixed-top navbar navbar-expand-lg navbar-light navbar-nutragen">
        	<div class="container">
        		<a class="navbar-brand" href="#">
				    <img src="frontend/images/nutragen-logo.png" height="50" alt="Nutragen">
				</a>
	            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
	                <span class="navbar-toggler-icon">
	                </span>
	            </button>
	            <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                <ul class="navbar-nav ml-auto">
	                    <li class="nav-item active">
	                        <a class="nav-link" href="#">
	                            About
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">
	                            Products
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">
	                            Distribution
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">
	                            Services
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">
	                            News
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">
	                            Contact Us
	                        </a>
	                    </li>
	                </ul>

	            </div>
        	</div>
        </nav>

        <div class="main">
        	<div class="box">
        		<h2 class="white-color">
        			Every Journey <br/>
					Begins with a Story...
				</h2>
        		<p class="white-color">
        			...but ours begins with A Mission. <br/>
					PT Nutragen Global Esana establishes in 2015 with a purpose <br/>
					to deliver fresh and good quality products for every family.
				</p>
        	</div>

        	<div class="translate-up">
	        	<div class="box logo">
	        		<img src="{{ asset('frontend/images/delivering-the-good-life.png') }}" height="250">
	        	</div>
        	</div>

        	<div class="translate-up">
	        	<div class="box">
	        		<h2 class="red-color">
	        			Good Nutrition <br/>
						for a Healthy Generation
					</h2>
	        		<p>
	        			Nutragen believes that a good nutrition is the key to every child's <br/>
	        			bright future. Just like our motto that says 
	        		</p>
	        		<p class="quote">
	        			<img src="{{ asset('frontend/images/start-quote.png') }}" class="quote start">
	        			Happy Snacking with Good Taste of Food
	        			<img src="{{ asset('frontend/images/end-quote.png') }}" class="quote end">
	        		</p>
	        	</div>
	        </div>
	        <div class="wheat"></div>
        </div>

        <div class="principles container white-color">
        	<h2 class="text-right">Our Principles</h2>
        	<div class="path-dots">
        		<div class="circle">
        			<img src="{{ asset('frontend/images/f-circle.png') }}" class="circle f">
        			<p>Fast</p>
        		</div>

        		<div class="circle">
        			<img src="{{ asset('frontend/images/r-circle.png') }}" class="circle r">
        			<p>Relible</p>
        		</div>

        		<div class="circle">
        			<img src="{{ asset('frontend/images/e-circle.png') }}" class="circle e">
        			<p>Excellent</p>
        		</div>

        		<div class="circle">
        			<img src="{{ asset('frontend/images/s-circle.png') }}" class="circle s">
        			<p>Service</p>
        		</div>

        		<div class="circle">
        			<img src="{{ asset('frontend/images/h-circle.png') }}" class="circle h">
        			<p>High Committed</p>
        		</div>
        	</div>
        	<div class="text-center">
        		<a href="#" class="button">Read More</a>
        	</div>
        </div>

        <div class="distribution container bootstrap">
        	<div class="row">
        		<div class="col-md-6">
        			<img src="{{ asset('frontend/images/worldwide-n-nationwide-distribution.png') }}" width="100%">
        		</div>
        		<div class="col-md-6 spacing">
        			<h2 class="white-color">Our Product Distribution</h2>

        			<h3 class="spacing">Traditional Channel</h3>
        			<p>
        				Local distributors, agents, direct selling teams in wet markets, canteens <br/> 
						and small shops.
					</p>

        			<h3 class="spacing">Modern Market</h3>
        			<p>
        				<b>Hypermarket:</b> Lotte Mart, Giant, Carrefour, Hypermart <br/>
						<b>Supermarket:</b> Alfamart, Indomart, Watson, and many more <br/>
						<b>Special Outlet:</b> Pharmacies, Bakeries, Beauty Clinics, Caterings, Restaurants.
        			</p>

        			<a href="#" class="button">Read More</a>
        		</div>
        	</div>
        </div>

        <div class="certification container bootstrap">
        	<h2 class="text-center heading-underline white-color spacing">
        		Certification
        	</h2>
        	<p class="text-center">
        		<img src="{{ asset('frontend/images/gmp.png') }}" height="100">
	        	<img src="{{ asset('frontend/images/halal.png') }}" height="100">
	        	<img src="{{ asset('frontend/images/fssc.png') }}" height="50">
	        	<img src="{{ asset('frontend/images/iso.png') }}" height="50">
        	</p>
        </div>

        <div class="what-we-do container bootstrap">
        	<h2 class="text-center heading-underline white-color spacing">
        		What We Do
        	</h2>
        	<div class="row">
        		<div class="col-md-4 mini-spacing">
        			<img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
        			<h3>Sales Team (Independents)</h3>
        			<p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
        		</div>
        		<div class="col-md-4 mini-spacing">
        			<img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
        			<h3>Sales Team (Independents)</h3>
        			<p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
        		</div>
        		<div class="col-md-4 mini-spacing">
        			<img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
        			<h3>Sales Team (Independents)</h3>
        			<p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
        		</div>
        		<div class="col-md-4 mini-spacing">
        			<img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
        			<h3>Sales Team (Independents)</h3>
        			<p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
        		</div>
        		<div class="col-md-4 mini-spacing">
        			<img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
        			<h3>Sales Team (Independents)</h3>
        			<p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
        		</div>
        		<div class="col-md-4 mini-spacing">
        			<img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
        			<h3>Sales Team (Independents)</h3>
        			<p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
        		</div>
        	</div>
        </div>

        <div class="breakpoint">
        	<img src="{{ asset('frontend/images/bottom-round-shape.png') }}" width="100%">
        </div>

        <div class="product bootstrap">
        	<h2 class="heading-underline-orange text-center red-color">
        		Our Product
        	</h2>
        	<div class="container">
        		<div class="row mini-spacing">
	        		<div class="col-md-3 text-center">
	        			<div class="logo">
	        				<img src="{{ asset('frontend/images/gofress-logo.png') }}" class="name"> <br/>
	        				<img src="{{ asset('frontend/images/shadow-product.png') }}">
	        			</div>
	        			<p>Now you can have an instantly fresh breath in no time!</p>
	        		</div>

	        		<div class="col-md-3 text-center">
	        			<div class="logo">
	        				<img src="{{ asset('frontend/images/gofress-logo.png') }}" class="name"> <br/>
	        				<img src="{{ asset('frontend/images/shadow-product.png') }}">
	        			</div>
	        			<p>Now you can have an instantly fresh breath in no time!</p>
	        		</div>

	        		<div class="col-md-3 text-center">
	        			<div class="logo">
	        				<img src="{{ asset('frontend/images/gofress-logo.png') }}" class="name"> <br/>
	        				<img src="{{ asset('frontend/images/shadow-product.png') }}">
	        			</div>
	        			<p>Now you can have an instantly fresh breath in no time!</p>
	        		</div>

	        		<div class="col-md-3 text-center">
	        			<div class="logo">
	        				<img src="{{ asset('frontend/images/gofress-logo.png') }}" class="name"> <br/>
	        				<img src="{{ asset('frontend/images/shadow-product.png') }}">
	        			</div>
	        			<p>Now you can have an instantly fresh breath in no time!</p>
	        		</div>
	        	</div>
	        	<div class="text-center mini-spacing">
	        		<a href="#" class="button">Read More</a>
	        	</div>
        	</div>
        </div>

        <div class="partners container-fluid bootstrap">
        	<h2 class="heading-underline-orange text-center red-color spacing">
        		Pick, Click, Enjoy!
        	</h2>
        	<div class="container">
        		<p class="text-center">
	        		<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
		        	<img src="{{ asset('frontend/images/ralali-logo.png') }}" width="250">
	        	</p>
        	</div>
        </div>

        <div class="footer container-fluid bootstrap">
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
</html>