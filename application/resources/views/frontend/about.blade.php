@extends('frontend._layout.master')

@section('title')
    Nutragen - About
@endsection

@section('style')
    <style type="text/css">
        .wheat {
            position: relative;
            height: 60px;
        }
        .wheat > div
        {

            background-color: #f7b733;
            position: absolute;
            bottom: -245px;
            background-image: url(frontend/images/white-wheat-diagonal.png);
            background-repeat: no-repeat, repeat;
            background-size: 113%;
            background-position: bottom center;
            height: 2000px;
            width: 100%;
            z-index: -1;
        }

        @media(min-width: 992px)
        {
            .translate-up{
                position: relative;
                bottom: 120px;
            }
        }

        @media(max-width: 991px)

        {
            .mobile-white-background
            {
                background-color: white;
            }

            .wheat > div
            {

                bottom: -245px;
            }
        }

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
            <div class="aniview" data-av-animation="fadeInUp">
                <div class="text-center mini-spacing">
                    <h1 class="heading-underline white-color">About</h1>
                    <h2 style="font-size: 44px;" class="mini-spacing">Every Journey Begins with a Story...</h2>
                    <p style="font-size: 16px;" class="mini-spacing">
                        But our story begins with A Mission.<br/>
                        PT Nutragen Global Esana establishes in 2015 with a purpose to deliver fresh and good quality products for every family.
                    </p>
                </div>
            </div>
            

            <div class="aniview" data-av-animation="fadeInLeft">
                <div class="row mini-spacing">
                    <div class="col-lg-6">
                        <h2 class="white-color">
                            Good Nutrition <br/>
                            for a Healthy Generation
                        </h2>
                        <p class="white-color mini-spacing">
                            Nutragen believes that a good nutrition is the key to a healthy generation. As a commitment to our motto that says ‘Delivering The Good Life’, we are doing it one step at a time. As a trading company, our business starts by exporting and selling local products in domestic as well as international market. We only deliver products that make people live better, and committed to serve tasty yet healthy products with a reasonable price that encourage people to eat better.
                        </p>
                    </div>
                </div>
            </div>

            <div class="aniview" data-av-animation="fadeInRight">
                <div class="row mini-spacing justify-content-end">
                    <div class="col-lg-6 text-center mobile-white-background">
                        <h2 class="red-color">
                            Our Vision
                        </h2>
                        <p class="mini-spacing">
                            In the future, Nutragen will be the leading company in marketing, selling and distribution of healthy food and beverages. Getting there requires continuous innovation, qualified human resources, and high technology utilization.<br/>
                            And yeah, we have all of those.
                        </p>
                    </div>
                </div>
            </div>

            <div class="aniview" data-av-animation="fadeInRight">
                <div class="row mini-spacing justify-content-end">
                    <div class="col-lg-6 text-center mobile-white-background">
                        <h2 class="red-color">
                            Our Mission
                        </h2>
                        <p class="mini-spacing">
                            We are providing only the best, high quality, safe and healthy products that fit consumers’ needs. By doing so, we are actively contributing in an effort to increase the life quality of our society. Now every family can easily afford fresh, healthy food that tastes good!
                        </p>
                    </div>
                </div>
            </div>

            <div class="aniview" data-av-animation="fadeIn">
                <div class="row mini-spacing">
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('frontend/images/delivering-the-good-life.png') }}" class="img-large translate-up">
                    </div>
                </div>
            </div>
            
        </div>

        <div class="container-fluid full wheat">
            <div></div>
        </div>

        <div class="principles container white-color">
            <div class="aniview" data-av-animation="fadeInRight">
                <h2 class="text-right white-color">Our Business</h2>
            </div>
            <div class="aniview" data-av-animation="fadeInRight">
                <p class="text-right white-color">
                    set of values:
                </p>
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
                            <p class="white-color"></p>
                        </div>
                        
                        <div class="text-box">
                            <h3 style="color: #f37047">Fast</h3>
                            <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
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
                            <p class="white-color"></p>
                        </div>
                        
                        <div class="text-box">
                            <h3 style="color: #57b0e3">Reliable</h3>
                            <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
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
                            <p class="white-color"></p>
                        </div>
                        
                        <div class="text-box">
                            <h3 style="color: #ee335d">Excellent</h3>
                            <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
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
                            <p class="white-color"></p>
                        </div>
                        
                        <div class="text-box">
                            <h3 style="color: #b0d237">Service</h3>
                            <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
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
                            <p class="white-color"></p>
                        </div>
                        
                        <div class="text-box">
                            <h3 style="color: #f7a71b">High Committed</h3>
                            <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection