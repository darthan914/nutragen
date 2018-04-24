@extends('frontend._layout.master')

@section('title')
    Nutragen - Service
@endsection

@section('style')
    <style type="text/css">
        .breakpoint
        {
            background-color: white;
            margin: 0;
            padding: 0;
        }

        /*What We Do*/
        .what-we-do .symbol
        {
            height: 50px;
        }
        /*end What We Do*/
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="content">
        <div class="what-we-do container bootstrap">
            <h2 class="text-center heading-underline white-color spacing">
                What We Do
            </h2>
            <div class="row">
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                    
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3>Sales Team (Independents)</h3>
                        <p>We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="breakpoint">
            <img src="{{ asset('frontend/images/bottom-round-shape.png') }}" width="100%">
        </div>

        <div class="container-fluid bootstrap white-background mini-spacing full" style="padding-bottom: 50px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                         <img src="{{ asset('frontend/images/person.png') }}" height="300">
                        
                    </div>

                    <div class="col-md-6 text-center">
                        <img src="{{ asset('frontend/images/clerk.png') }}" class="symbol">
                        <h3 class="mini-spacing">Sales Team (Independents)</h3>
                        <p class="mini-spacing">We have a highly skilled sales team who have substantial expertise and specialist knowledge. We cover the whole of the Indonesia across all trade channels.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection