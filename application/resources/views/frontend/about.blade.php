@extends('frontend._layout.master')

@section('title')
    Nutragen - About
@endsection

@section('style')
    <style type="text/css">
        .level2{
            position: relative;
        }

        .wheat
        {

            position: absolute;
            background-image: url(frontend/images/white-wheat-diagonal.png);
            background-repeat: no-repeat, repeat;
            background-size: 113%;
            background-position: bottom center;
            height: 1345px;
            width: 100%;
            top: 100px;
            z-index: -1;
        }

        /*Principles*/

        .principles{
            padding-top: 70px;
            padding-bottom: 170px;
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

        div.circle .text-box
        {
            background-color: white;
            height: 250px;
            padding: 20px 0px;
            border-radius: 10px;
            position: relative;
            top: 60px;

        }

        div.circle .text-box h3
        {
            font-weight: 800;
        }

        div.circle p
        {
            margin-top: 18px;
            text-align: center;
            font-size: 17px;
            padding: 0 20px;
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
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="content">
        <div class="container-fluid bootstarp full">
            <div class="text-center mini-spacing">
                <h1 class="heading-underline white-color">About</h1>
                <h2 style="font-size: 44px;" class="mini-spacing">Every Journey Begins with a Story...</h2>
                <p style="font-size: 16px;" class="mini-spacing">
                    But our story begins with A Mission.<br/>
                    PT Nutragen Global Esana establishes in 2015 with a purpose to deliver fresh and good quality products for every family.
                </p>
            </div>

            <div class="level2">
                <div class="wheat"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="white-color">
                                Good Nutrition <br/>
                                for a Healthy Generation
                            </h2>
                            <p class="white-color mini-spacing">
                                Nutragen believes that a good nutrition is the key to a healthy generation. As a commitment to our motto that says ‘Delivering The Good Life’, we are doing it one step at a time. As a trading company, our business starts by exporting and selling local products in domestic as well as international market. We only deliver products that make people live better, and committed to serve tasty yet healthy products with a reasonable price that encourage people to eat better.
                            </p>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-center">
                            <h2 class="red-color">
                                Our Vision
                            </h2>
                            <p class="mini-spacing">
                                In the future, Nutragen will be the leading company in marketing, selling and distribution of healthy food and beverages. Getting there requires continuous innovation, qualified human resources, and high technology utilization.<br/>
                                <b style="text-decoration: underline;font-style: italic;">And yeah, we have all of those.</b>
                            </p>
                        </div>
                    </div>

                    <div class="row justify-content-end mini-spacing">
                        <div class="col-md-6 text-center">
                            <h2 class="red-color">
                                Our Mission
                            </h2>
                            <p class="mini-spacing">
                                We are providing only the best, high quality, safe and healthy products that fit consumers’ needs. By doing so, we are actively contributing in an effort to increase the life quality of our society. Now every family can easily afford fresh, healthy food that tastes good!
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('frontend/images/delivering-the-good-life.png') }}" height="250">
                        </div>
                    </div>
                </div>
                    
            </div>
            
        </div>

        <div class="principles container ">
            <h2 class="text-right white-color">Our Principles</h2>
            <p class="text-right white-color">
                By being our partner, you will get more than you pay for. Our business runs with these <br/>unshakeable, unnegotiable set of values:
            </p>
            <div class="path-dots">
                <div class="circle">
                    <img src="{{ asset('frontend/images/f-circle.png') }}" class="circle f">
                    <div class="text-box">
                        <h3 style="color: #f37047">Fast</h3>
                        <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
                    </div>
                </div>

                <div class="circle">
                    <img src="{{ asset('frontend/images/r-circle.png') }}" class="circle r">

                    <div class="text-box">
                        <h3 style="color: #57b0e3">Relible</h3>
                        <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
                    </div>
                </div>

                <div class="circle">
                    <img src="{{ asset('frontend/images/e-circle.png') }}" class="circle e">

                    <div class="text-box">
                        <h3 style="color: #ee335d">Excellent</h3>
                        <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
                    </div>
                </div>

                <div class="circle">
                    <img src="{{ asset('frontend/images/s-circle.png') }}" class="circle s">

                    <div class="text-box">
                        <h3 style="color: #b0d237">Service</h3>
                        <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
                    </div>
                </div>

                <div class="circle">
                    <img src="{{ asset('frontend/images/h-circle.png') }}" class="circle h">

                    <div class="text-box">
                        <h3 style="color: #f7a71b">High Committed</h3>
                        <p>The world is moving quickly and your time is precious. We are committed to serve our customer as efficient as possible.</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="button">Read More</a>
            </div>
        </div>
    </div>
@endsection