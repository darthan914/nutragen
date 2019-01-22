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

        .change-content
        {
            cursor: pointer;
            height: initial;
        }

        /*end Detail Product*/
    </style>
@endsection

@section('script')

    <script type="text/javascript">
        $(function(){
            $(".change-content").click(function() {
                var image_logo = $(this).data('image_logo');
                var image_logo_height = $(this).data('image_logo_height');
                var description = $(this).data('description');
                var image_product = $(this).data('image_product');

                $(".output-content").fadeOut('fast', function() {
                    $(".output-content .output-image_logo").attr('src', image_logo).css('height', image_logo_height);
                    $(".output-content .output-description").html(description);
                    $(".output-content .output-image_product").attr('src', image_product);
                    $(".output-content").fadeIn();
                });

                $('html, body').animate({
                    scrollTop: $("#product").offset().top
                }, 2000);
            });
        });
    </script>

@endsection

@section('meta')
<meta name="og:title" content="{{ $product_meta_name->value }}"/>
<meta name="og:url" content="{{ $product_meta_url->value }}"/>
<meta name="og:image" content="{{ asset($product_meta_image->value) }}"/>
<meta name="og:description" content="{{ $product_meta_description->value }}"/>
@endsection

@section('content')
    <div class="content">
        {{-- <div class="product bootstrap mini-spacing">
            <h2 class="heading-underline text-center white-color">
                Our Product
            </h2>
            <div class="container">
                <div class="row mini-spacing">
                    @foreach($product as $list)
                    <div class="col-lg-3 text-center change-content" 
                        data-image_logo="{{ asset($list->image_logo) }}" 
                        data-image_logo_height="{{ $list->image_logo_height ? $list->image_logo_height.'px' : 'initial' }}" 
                        data-description="{{ $list->description }}" 
                        data-image_product="{{ asset($list->image_product) }}"
                    >
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

        <div class="detail-product bootstrap" id="product">
            <div class="container">
                <div class="row align-items-center output-content">
                    <div class="col-md-6 text-center">
                        <div class="logo">
                            <img src="{{ asset($getFirstProduct->image_logo) }}" class="name output-image_logo" style="height: {{ $getFirstProduct->image_logo_height ? $getFirstProduct->image_logo_height.'px' : 'initial' }}"> <br/>
                        </div>
                        <div class="text-center mini-spacing output-description">
                            {!! $getFirstProduct->description !!}
                        </div>
                        
                    </div>

                    <div class="col-md-6 text-center">
                            <img src="{{ asset($getFirstProduct->image_product) }}" width="100%" class="output-image_product"> <br/>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="detail-product bootstrap" id="product">
            <h2 class="heading-underline text-center red-color">
                Our Product
            </h2>
            <div class="container">
                @foreach($product as $list)
                <div class="row align-items-center output-content">
                    <div class="col-md-6 text-center">
                        <div class="logo">
                            <img src="{{ asset($list->image_logo) }}" class="name output-image_logo" style="height: {{ $list->image_logo_height ? $list->image_logo_height.'px' : 'initial' }}"> <br/>
                        </div>
                        <div class="text-center mini-spacing output-description">
                            {!! $list->description !!}
                        </div>
                        
                    </div>

                    <div class="col-md-6 text-center">
                            <img src="{{ asset($list->image_product) }}" width="100%" class="output-image_product"> <br/>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection