@extends('frontend._layout.master')

@section('title')
    Distribution
@endsection

@section('style')
    <style type="text/css">
        .diagonal
        {
            position: relative;
        }
        .diagonal::after
        {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            top: 360px;
            left: 0;
            background-color: white;
            z-index: -1;
            transform: skewY(-28deg);
        }

        p > img
        {
            
            padding: 10px 5px;
        }
    </style>
@endsection

@section('script')

@endsection

@section('meta')
<meta name="og:title" content="{{ $distribution_meta_name->value }}"/>
<meta name="og:url" content="{{ $distribution_meta_url->value }}"/>
<meta name="og:image" content="{{ asset($distribution_meta_image->value) }}"/>
<meta name="og:description" content="{{ $distribution_meta_description->value }}"/>
@endsection

@section('content')
    <div class="content">
        <div class="diagonal container-fluid bootstrap">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/worldwide-n-nationwide-distribution.png') }}" width="60%">
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid white-background text-center mini-spacing">
            <div class="aniview" data-av-animation="fadeIn">
                <h3>Traditional Channel</h3>
                <p>
                    Local distributors, agents, direct selling teams in wet markets, canteens <br/>
                    and small shops.
                </p>
            </div>
        </div>

        <div class="container-fluid white-background text-center mini-spacing">
            <div class="aniview" data-av-animation="fadeIn">
                <h3>Modern Market</h3>
                <p>
                    <b>Hypermarket</b>: Lotte Mart, Giant, Carrefour, Hypermart<br/>
                    <b>Supermarket</b>: Alfamart, Indomart, Watson, and many more<br/>
                    <b>Special Outlet</b>: Pharmacies, Bakeries, Beauty Clinics, Caterings, Restaurants.
                </p>
            </div>
        </div>

        <div class="container-fluid white-background text-center mini-spacing" style="">
            <div class="container">
                <div class="aniview" data-av-animation="fadeIn">
                    <p class="text-center spacing">
                        @foreach($distribution as $list)
                        <img src="{{ asset($list->image_logo) }}" class="img-small" style="{{ $list->image_height ? 'height: '.$list->image_height.'px;' : '' }}">
                        @endforeach
                        @foreach($ecommerce as $list)
                        <img src="{{ asset($list->image_logo) }}" class="img-small" style="{{ $list->image_height ? 'height: '.$list->image_height.'px;' : '' }}">
                        @endforeach
                    </p>
                </div>
                
            </div>
            
        </div>

    </div>
@endsection