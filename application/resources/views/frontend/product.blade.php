@extends('frontend._layout.master')

@section('title')
    Products
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

        @media(max-width: 991px)
        {
            .product .logo .name {
                height: auto !important;
            }
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

@section('meta')
<meta name="og:title" content="{{ $product_meta_name->value }}"/>
<meta name="og:url" content="{{ $product_meta_url->value }}"/>
<meta name="og:image" content="{{ asset($product_meta_image->value) }}"/>
<meta name="og:description" content="{{ $product_meta_description->value }}"/>
@endsection

@section('content')
    <div class="content">
        <div class="product bootstrap mini-spacing">
            <h2 class="heading-underline text-center white-color">
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
                                    <img src="{{ asset($list->image_logo) }}" class="img-medium img-product" style="{{ ($list->image_logo_height ? 'height: '.$list->image_logo_height.'px;' : '') }}">
                                </div>
                            </div>
                            <br/>
                            <img src="{{ asset('frontend/images/shadow-product.png') }}">
                        </div>
                        <p>{{ $list->short_description }}</p>
                    </div>
                    @endforeach
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