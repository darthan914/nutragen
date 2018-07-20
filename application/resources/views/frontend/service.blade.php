@extends('frontend._layout.master')

@section('title')
    Service
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

@section('meta')
<meta name="og:title" content="{{ $service_meta_name->value }}"/>
<meta name="og:url" content="{{ $service_meta_url->value }}"/>
<meta name="og:image" content="{{ asset($service_meta_image->value) }}"/>
<meta name="og:description" content="{{ $service_meta_description->value }}"/>
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
                        <p>
                            We have a highly skilled sales team who have
                            substantial expertise and specialist knowledge. We
                            cover the whole of the Indonesia across all trade
                            channels from small independents, wholesale, cash &
                            carry, convenience and food service, and thrive on
                            building strong relationships with all our customers.
                        </p>
                    </div>
                    
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/group.png') }}" class="symbol">
                        <h3>Sales Team (Multiples)</h3>
                        <p>
                            We have a dedicated sales team focused solely within
                            the multiple retail sales channel, we pride ourselves in
                            creating strong long term relationships across
                            numerous categories within each retailer.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/business-affiliate-network.png') }}" class="symbol">
                        <h3>Marketing & Brand Management</h3>
                        <p>
                            Targeted marketing makes all the diﬀerence in
                            achieving standout in today’s ever increasing competitive retail
                            environments. We have a dedicated brand manager
                            working on each brand, and our expertise and skill
                            across the whole of the marketing mix to ensure
                            success in today’s competitive environment.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/truck.png') }}" class="symbol">
                        <h3>Purchasing & Logistics</h3>
                        <p>
                            In the purchasing and logistics team, we work closely
                            with suppliers and various transport companies. We
                            always look for the best solutions to import and deliver
                            products to you at the best prices and with the best
                            possible lead times, whether you are local or overseas.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/icon.png') }}" class="symbol">
                        <h3>Technical</h3>
                        <p>
                            Our technical strength has been established through
                            a long tradition of industry excellence. Led by our
                            highly qualiﬁed in-house technical team, we are
                            available to share our knowledge in the areas of
                            product development, quality assurance, product
                            sampling and grading. We have also developed long-standing
                            relationships with FSSC 22000 approved suppliers.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mini-spacing">
                    <div class="aniview" data-av-animation="flipInY">
                        <img src="{{ asset('frontend/images/warehouse.png') }}" class="symbol">
                        <h3>Warehouse</h3>
                        <p>
                            Our warehouse has 12,000 sq ft of space and is ISO
                            Certiﬁed. Our location is perfect for distribution
                            throughout the Indonesia. Our customers beneﬁt from
                            the environmental and cost eﬃciencies we generate
                            through the supply chain, from warehousing and
                            receipt of orders, to consolidated deliveries and
                            invoicing.
                        </p>
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