@extends('frontend._layout.master')

@section('title')
    Nutragen - Home
@endsection

@section('style')
    <style type="text/css">
        /*Main Company*/
        .wheat
        {

            background-color: #f7b733;
            position: absolute;
            top: 0px;
            background-image: url(frontend/images/white-wheat-diagonal.png);
            background-repeat: no-repeat, repeat;
            background-size: 113%;
            background-position: bottom center;
            height: 1265px;
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
            background-size: 80%;
            background-position: center center;
            text-align: center;
            height: 100px;
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .principles .path-dots div.circle{
            display: inline-block;
            width: 19%;
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
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="content">
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
    </div>
@endsection