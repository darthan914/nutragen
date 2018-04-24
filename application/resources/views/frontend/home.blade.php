@extends('frontend._layout.master')

@section('title')
    Nutragen - Home
@endsection

@section('style')
    <style type="text/css">
        /*Main Company*/
        .wheat {
            position: relative;
            height: 60px;
        }
        .wheat > div
        {

            background-color: #f7b733;
            position: absolute;
            bottom: -360px;
            background-image: url(frontend/images/white-wheat-diagonal.png);
            background-repeat: no-repeat, repeat;
            background-size: 113%;
            background-position: bottom center;
            height: 2000px;
            width: 100%;
            z-index: -1;
        }

        @media(max-width: 991px)
        {
            .wheat > div
            {
                bottom: -280px;
            }
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
            padding-top: 20px;
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
            margin-top: 40px;
            margin-bottom: 40px;
            text-align: center;
        }

        .circle .name
        {
            height: 30px;
        }

        .principles .path-dots img.circle{
            height: 60px;
            margin: auto;
            -webkit-filter: drop-shadow(8px 8px 10px black);
            filter: drop-shadow(8px 8px 10px black);
        }

        div.circle p
        {
            text-align: center;
            font-weight: 800;
            font-size: 17px;
        }

        div.circle .text-box
        {
            background-color: white;
            border-radius: 10px;
            margin: 20px 5px;
            padding: 0px 5px;

        }

        @media (min-width: 992px)
        {
            .principles .path-dots{
                background-image: url(frontend/images/fresh-dots.png);
                background-repeat: no-repeat, repeat;
                background-size: 80%;
                background-position: 50% 2%;
            }

            .principles .path-dots div.circle
            {
                /*text-align: center;*/

                flex: 0 0 20%;
                max-width: 20%;
            }

            div.circle .name
            {
                display: block;
            }

            div.circle .name p
            {
                margin-top: 50px;
            }

            div.circle .text-box
            {
                height: 250px;
            }

            div.circle .text-box > *
            {
                padding: 10px 0px;

            }

            div.circle .text-box h3
            {
                font-weight: 800;
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
        }
        
        @media(max-width: 991px)
        {
            .circle
            {
                display: flex;
            }
            .circle .logo{
                flex: 0 0 20%;
                max-width: 20%;
                white-space: nowrap;
            }

            .circle .logo .helper
            {
                display: inline-block;
                height: 28%;
                vertical-align: middle;
            }

            .circle .text-box {
                flex: 0 0 65%;
                max-width: 65%;
                margin: 20px 17px !important;
            }
        }

        .aniview-f {
            -webkit-animation-delay: 0.5s;
        }
        .aniview-r {
            -webkit-animation-delay: 1s;
        }
        .aniview-e {
            -webkit-animation-delay: 1.5s;
        }
        .aniview-s {
            -webkit-animation-delay: 2s;
        }
        .aniview-h {
            -webkit-animation-delay: 2.5s;
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
            height: 150px;
            display: inline-block;
            width: 100%;
            white-space: nowrap;
        }

        .product .logo .name .helper
        {
            display: inline-block;
            height: 100%;
            vertical-align: middle;
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
    <script type="text/javascript">
        $(function() {
            $('.aniview-f, .aniview-r, .aniview-e, .aniview-s, .aniview-h').AniView();
        });
    </script>
@endsection

@section('content')
    <div class="content">
        
        <div class="container">
            <div class="row mini-spacing">
                <div class="col-lg-6">
                    <div class="aniview" data-av-animation="fadeInLeft">
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
                    
                </div>
            </div>
            <div class="row mini-spacing justify-content-end">
                <div class="col-lg-6 text-right">
                    <div class="aniview" data-av-animation="fadeInRight">
                        <img src="{{ asset('frontend/images/delivering-the-good-life.png') }}" class="img-large">
                    </div>
                </div>
            </div>
            <div class="row mini-spacing">
                <div class="col-lg-6">
                    <div class="aniview" data-av-animation="fadeInLeft">
                        <h2 class="red-color">
                            Good Nutrition <br/>
                            for a Healthy Generation
                        </h2>
                        <p>
                            We Only deliver products that make people live better, and commited to serve tasty yet healthy products with a reasonable price that encourage people to eat better. 
                        </p>
                        {{-- <p class="quote">
                            <img src="{{ asset('frontend/images/start-quote.png') }}" class="quote start">
                            Happy Snacking with Good Taste of Food
                            <img src="{{ asset('frontend/images/end-quote.png') }}" class="quote end">
                        </p> --}}
                    </div>
                </div>
            </div>
            
        </div>

        <div class="container-fluid full wheat">
            <div class=""></div>
        </div>

        <div class="principles container white-color">
            <div class="aniview" data-av-animation="fadeInRight">
                <h2 class="text-right">Our business</h2>
                <p class="text-right mini-spacing">runs with these unshakeable, unnegotiable set of values</p>
            </div>

            <div class="aniview" data-av-animation="fadeInUp">
                <div class="row justify-content-center path-dots">
                    <div class="circle">
                        <div class="logo">
                            <div class="aniview-f" data-av-animation="bounceIn">
                                <span class="helper"></span>
                                <img src="{{ asset('frontend/images/f-circle.png') }}" class="circle f">
                            </div>
                            
                        </div>
                        
                        <div class="name d-none d-sm-none d-lg-block">
                            <div class="aniview-f" data-av-animation="bounceInDown">
                                <p class="white-color">Fast</p>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="circle">
                        <div class="logo">
                            <div class="aniview-r" data-av-animation="bounceIn">
                                <span class="helper"></span>
                                <img src="{{ asset('frontend/images/r-circle.png') }}" class="circle r">
                            </div>
                        </div>
                        
                        <div class="name d-none d-sm-none d-lg-block">
                            <div class="aniview-r" data-av-animation="bounceInDown">
                                <p class="white-color">Reliable</p>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="circle">
                        <div class="logo">
                            <div class="aniview-e" data-av-animation="bounceIn">
                                <span class="helper"></span>
                                <img src="{{ asset('frontend/images/e-circle.png') }}" class="circle e">
                            </div>
                        </div>
                        
                        <div class="name d-none d-sm-none d-lg-block">
                            <div class="aniview-e" data-av-animation="bounceInDown">
                                <p class="white-color">Excellent</p>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="circle">
                        <div class="logo">
                            <div class="aniview-s" data-av-animation="bounceIn">
                                <span class="helper"></span>
                                <img src="{{ asset('frontend/images/s-circle.png') }}" class="circle s">
                            </div>
                        </div>
                        
                        <div class="name d-none d-sm-none d-lg-block">
                            <div class="aniview-s" data-av-animation="bounceInDown">
                                <p class="white-color">Service</p>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="circle">
                        <div class="logo">
                            <div class="aniview-h" data-av-animation="bounceIn">
                                <span class="helper"></span>
                                <img src="{{ asset('frontend/images/h-circle.png') }}" class="circle h">
                            </div>
                        </div>
                        
                        <div class="name d-none d-sm-none d-lg-block">
                            <div class="aniview-h" data-av-animation="bounceInDown">
                                <p class="white-color">High Committed</p>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <div class="text-center">
                <div class="aniview" data-av-animation="pulse">
                    <a href="{{ route('frontend.about') }}" class="button">Read More</a>
                </div>
            </div>
        </div>

        <div class="distribution container bootstrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="aniview" data-av-animation="flipInX">
                        <img src="{{ asset('frontend/images/worldwide-n-nationwide-distribution.png') }}" width="100%">
                    </div>
                </div>
                <div class="col-lg-6 spacing">
                    <div class="aniview" data-av-animation="fadeInLeft">
                        <h2 class="white-color">Our Product Distribution</h2>
                    </div>

                    <div class="aniview" data-av-animation="fadeInLeft">
                        <h3 class="spacing">Traditional Channel</h3>
                        <p>
                            Local distributors, agents, direct selling teams in wet markets, canteens <br/> 
                            and small shops.
                        </p>
                    </div>

                    <div class="aniview" data-av-animation="fadeInLeft">
                        <h3 class="spacing">Modern Market</h3>
                        <p>
                            <b>Hypermarket:</b> Lotte Mart, Giant, Carrefour, Hypermart <br/>
                            <b>Supermarket:</b> Alfamart, Indomart, Watson, and many more <br/>
                            <b>Special Outlet:</b> Pharmacies, Bakeries, Beauty Clinics, Caterings, Restaurants.
                        </p>
                    </div>

                    <a href="{{ route('frontend.distribution') }}" class="button">Read More</a>
                </div>
            </div>
        </div>

        <div class="certification container bootstrap">
            <h2 class="text-center heading-underline white-color spacing">
                Certification
            </h2>
            <div class="aniview" data-av-animation="fadeIn">
                <p class="text-center">
                    @foreach($license as $list)
                    
                        <img src="{{ asset($list->image_logo) }}" class="img-medium" style="{{ $list->image_height ? 'height: '.$list->image_height.';' : '' }}">
                    
                    @endforeach
                </p>
            </div>
        </div>

        <div class="what-we-do container bootstrap">
            <h2 class="text-center heading-underline white-color spacing">
                What We Do
            </h2>
            <div class="row">
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                    
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
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
                    @foreach($product as $list)
                    <div class="col-lg-3 text-center">
                        <div class="logo">
                            <div class="aniview" data-av-animation="fadeInDown">
                                <div class="name">
                                    <span class="helper"></span>
                                    <img src="{{ asset($list->image_logo) }}" class="img-medium" style="{{ ($list->image_logo_height ? 'height: '.$list->image_logo_height.'px;' : '') }}">
                                </div>
                            </div>
                            <br/>
                            <img src="{{ asset('frontend/images/shadow-product.png') }}">
                        </div>
                        <p>{{ $list->short_description }}</p>
                    </div>
                    @endforeach

                </div>
                <div class="aniview" data-av-animation="pulse">
                    <div class="text-center mini-spacing">
                        <a href="{{ route('frontend.product') }}" class="button">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="partners container-fluid bootstrap">
            <h2 class="heading-underline-orange text-center red-color spacing">
                Pick, Click, Enjoy!
            </h2>
            <div class="container">
                <div class="aniview" data-av-animation="fadeIn">
                    <p class="text-center">
                        @foreach($partner as $list)
                        <img src="{{ asset($list->image_logo) }}" class="img-medium" style="{{ $list->image_height ? 'height: '.$list->image_height.'px;' : '' }}">
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        
    </div>
@endsection