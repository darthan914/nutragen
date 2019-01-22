@extends('frontend._layout.master')

@section('title')
    {{ $news->title }}
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

@section('meta')
<meta name="og:title" content="{{ $news->meta_title }}"/>
<meta name="og:url" content="{{ $news->meta_url }}"/>
<meta name="og:image" content="{{ asset($news->meta_image) }}"/>
<meta name="og:description" content="{{ $news->meta_description }}"/>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid bootstrap full mini-spacing">
            <h1 class="heading-underline text-center white-color">
                {{ $news->title }}
            </h1>
        </div>

        <div class="container-fluid bootstrap full news-image" style="background-image: url('{{ asset($news->photo) }}');">
        </div>

        <div class="container-fluid bootstrap full mini-spacing white-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container-fluid">
                            <div class="news-datetime">
                                <b>{{ $news->created_at }}</b>
                            </div>

                            <div class="news-title">
                                <h4>
                                    {!! $news->title !!}
                                </h4>
                            </div>

                            <div class="news-content">
                                {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h4>
                                Latest News
                            </h4>
                            <ul class="sidebar">
                                @foreach($latest as $list)
                                <li><a href="{{ route('frontend.in-news', $list->slug_url) }}">{{ $list->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div>
                            <h4>
                                Archives
                            </h4>
                            <ul class="sidebar">
                                @foreach($archive as $list)
                                <li><a href="#">{{ date('d F Y', strtotime($list->created_at)) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection