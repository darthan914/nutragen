@extends('frontend._layout.master')

@section('title')
    Nutragen - Distribution
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

@section('content')
    <div class="content">
        <div class="diagonal container-fluid bootstrap">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('frontend/images/worldwide-n-nationwide-distribution.png') }}" width="60%">
                </div>
            </div>
        </div>

        <div class="container-fluid white-background text-center mini-spacing">
            <h3>Traditional Channel</h3>
            <p>
                Local distributors, agents, direct selling teams in wet markets, canteens <br/>
                and small shops.
            </p>
        </div>

        <div class="container-fluid white-background text-center mini-spacing">
            <h3>Modern Market</h3>
            <p>
                <b>Hypermarket</b>: Lotte Mart, Giant, Carrefour, Hypermart<br/>
                <b>Supermarket</b>: Alfamart, Indomart, Watson, and many more<br/>
                <b>Special Outlet</b>: Pharmacies, Bakeries, Beauty Clinics, Caterings, Restaurants.
            </p>
        </div>

        <div class="container-fluid white-background text-center mini-spacing" style="">
            <div class="container">
                <p class="text-center spacing">
                    @foreach($distribution as $list)
                    <img src="{{ asset($list->image_logo) }}" height="{{ $list->image_height ?? 30 }}">
                    @endforeach
                </p>
                
            </div>
            
        </div>

    </div>
@endsection