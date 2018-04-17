@extends('frontend._layout.master')

@section('title')
    Nutragen - News
@endsection

@section('style')
    <style type="text/css">
        body
        {
            background-color: white!important
        }
        .diagonal
        {
            position: relative;
        }
        .diagonal::after
        {
            content: '';
            width: 100%;
            height: 500px;
            position: absolute;
            top: -300px;
            left: 0;
            background-color: #f7b733;
            z-index: -1;
            transform: skewY(-15deg);
        }

        /*News*/
        .news-image
        {
            width: 500px;
            height: 300px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            border: white thick solid;
        }

        .news-datetime
        {

        }

        .news-title
        {

        }

        .news-content
        {

        }

        .news-readmore
        {
            font-weight: bold;
        }

        ul.sidebar {
            list-style-type: none;
            margin: 0;
            padding: 15px 0px;
        }

        ul.pagination
        {
            font-family: 'Nunito';
            font-weight: bold;
        }

        ul.pagination > li
        {
            padding: 0px 10px;
        }
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="content">
        <div class="container-fluid bootstrap diagonal full mini-spacing">
            <h1 class="heading-underline text-center white-color">
                Latest News
            </h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container-fluid mini-spacing">
                            <div class="news-image" style="background-image: url('{{ asset('frontend/images/_0000_shutterstock_491996893.png') }}');">
                                
                            </div>

                            <div class="news-datetime">
                                <b>March 17, 2018, at 1:30 PM</b>
                            </div>

                            <div class="news-title">
                                <h4>
                                    Lorem Ipsum dolor sit amet
                                </h4>
                            </div>

                            <div class="news-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    <a href="{{ route('frontend.in-news') }}" class="news-readmore">Read More...</a>
                                </p>
                            </div>
                        </div>

                        <div class="container-fluid mini-spacing">
                            <div class="news-image" style="background-image: url('{{ asset('frontend/images/_0001_shutterstock_525192649.png') }}');">
                                
                            </div>

                            <div class="news-datetime">
                                <b>March 17, 2018, at 1:30 PM</b>
                            </div>

                            <div class="news-title">
                                <h4>
                                    Lorem Ipsum dolor sit amet
                                </h4>
                            </div>

                            <div class="news-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    <a href="{{ route('frontend.in-news') }}" class="news-readmore">Read More...</a>
                                </p>
                            </div>
                        </div>

                        <div class="container-fluid mini-spacing">
                            <div class="news-image" style="background-image: url('{{ asset('frontend/images/_0002_shutterstock_567294487.png') }}');">
                                
                            </div>

                            <div class="news-datetime">
                                <b>March 17, 2018, at 1:30 PM</b>
                            </div>

                            <div class="news-title">
                                <h4>
                                    Lorem Ipsum dolor sit amet
                                </h4>
                            </div>

                            <div class="news-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    <a href="{{ route('frontend.in-news') }}" class="news-readmore">Read More...</a>
                                </p>
                            </div>
                        </div>

                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                                <li class="disabled"><span>Prev Page</span></li>

                            {{-- Pagination Elements --}}
                                {{-- "Three Dots" Separator --}}
                                    <li class="disabled"><span>...</span></li>

                                {{-- Array Of Links --}}
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>

                                <li class="disabled"><span>...</span></li>

                            {{-- Next Page Link --}}
                                <li><a href="#" rel="next">Next Page</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h4>
                                Latest News
                            </h4>
                            <ul class="sidebar">
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4>
                                Archives
                            </h4>
                            <ul class="sidebar">
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                                <li><a href="#">loream ipsum dolor sit amet</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection