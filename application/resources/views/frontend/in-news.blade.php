@extends('frontend._layout.master')

@section('title')
    Nutragen - News
@endsection

@section('style')
    <style type="text/css">
        /*News*/
        .news-image
        {
            width: 100%;
            height: 500px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .news-datetime
        {

        }

        .news-title
        {

        }

        .news-content p
        {
            padding: 10px 0;
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
        <div class="container-fluid bootstrap full mini-spacing">
            <h1 class="heading-underline text-center white-color">
                Lorem Ipsum dolor sit amet
            </h1>
        </div>

        <div class="container-fluid bootstrap full news-image" style="background-image: url('{{ asset('frontend/images/_0000_shutterstock_491996893.png') }}');">
        </div>

        <div class="container-fluid bootstrap full mini-spacing white-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container-fluid">
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
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                </p>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id ante a diam varius efficitur. Praesent eget porttitor velit, vitae gravida odio. Nullam pulvinar sed dolor quis efficitur. Morbi ac ultrices leo. 
                                </p>
                            </div>
                        </div>
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