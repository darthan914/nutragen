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
            width: 100%;
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
                        @forelse($news as $list)
                        <div class="container-fluid mini-spacing">
                            <div class="news-image" style="background-image: url('{{ asset($list->photo) }}');">
                                
                            </div>

                            <div class="news-datetime">
                                <b>{{ date('d F Y H:i:s', strtotime($list->created_at)) }}</b>
                            </div>

                            <div class="news-title">
                                <h4>
                                    {{ $list->title }}
                                </h4>
                            </div>

                            <div class="news-content">
                                <p>
                                    {{ $list->description }}
                                    <a href="{{ route('frontend.in-news', $list->slug_url) }}" class="news-readmore">Read More...</a>
                                </p>
                            </div>
                        </div>
                        @empty
                        <p>No News Available</p>
                        @endforelse

                        {{ $news->links('vendor.pagination.default') }}

                        {{-- <ul class="pagination">
                                <li class="disabled"><span>Prev Page</span></li>

                                    <li class="disabled"><span>...</span></li>

                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>

                                <li class="disabled"><span>...</span></li>

                                <li><a href="#" rel="next">Next Page</a></li>
                        </ul> --}}
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