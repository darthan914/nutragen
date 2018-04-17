@extends('frontend._layout.master')

@section('title')
    Nutragen - Products
@endsection

@section('style')
    <style type="text/css">
        .breakpoint
        {
            background-color: white;
            margin: 0;
            padding: 0;
        }

        /*Product*/
        .product .logo .name
        {
            height: 100px;
        }

        .product .logo .shadow
        {
            width: 100px;
        }
        /*end Product*/

        /*Detail Product*/

        .detail-product
        {
            background-color: white;
            background-image: url(frontend/images/wheat.png);
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size: 275px;
        }

        .detail-product .row
        {
            height: 500px;
        }

        .detail-product .logo .name
        {
            height: 100px;
        }

        /*end Detail Product*/
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="content">
        <div class="product bootstrap mini-spacing">
            <h2 class="heading-underline text-center white-color">
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
            </div>
        </div>

        <div class="breakpoint">
            <img src="{{ asset('frontend/images/bottom-round-shape.png') }}" width="100%">
        </div>

        <div class="detail-product bootstrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        <div class="logo">
                            <img src="{{ asset('frontend/images/gofress-logo.png') }}" class="name"> <br/>
                        </div>
                        <div class="text-center mini-spacing">
                            <p>
                                Now you can have an instantly fresh breath in no time, thanks to Go Fress. A modern and innovative film strips candy with 6 fresh flavors of <b>Strawberry</b>, <b>Mango</b>, <b>Grape</b>,<br/>
                                <b>Orange</b>, <b>Lemon</b> and <b>The Original Peppermint</b>. Uniquely refreshing!<br/>
                                <br/>
                                <a href="#" class="orange-color"><b>Visit GoFress Website</b></a>
                            </p>
                        </div>
                        
                    </div>

                    <div class="col-md-6 text-center">
                            <img src="{{ asset('frontend/images/gofress-strips.png') }}" width="100%"> <br/>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection