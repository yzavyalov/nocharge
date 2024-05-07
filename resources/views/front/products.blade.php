@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    No frod system.
@endsection
@section('description')
    Our participants consist of online enterprises engaged in the facilitation and management of user payments. We are committed to fostering seamless communication among these entities and furnishing them with cutting-edge tools to mitigate their operational costs.
    During the global online payment process, certain challenges arise, accounting for approximately 10% of their turnover. These include customers abusing chargebacks and unscrupulous intermediaries misappropriating funds from their merchants.
    Our endeavor focuses on facilitating the exchange of information regarding such entities among participants to prevent financial losses and reduce expenses. We have devised innovative mechanisms to automate the information exchange process, thereby reducing losses to around 3%, enhancing the efficiency and resilience of our partners in the online payment sphere.
@endsection
@section('img')
    {{ asset('img/Logo.png') }}
@endsection
@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>API documantation</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/api_image.png') }}" alt="api" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-6">
                    <p>Our system empowers users to leverage its functionality both through the company dashboard on the website and via API. This enables our participants to conduct transaction checks without visiting our site, seamlessly integrating the verification process into their own workflows. To utilize our API, you need to register, proceed to set up your company in the dashboard, and acquire an authorization token. Additionally, our dashboard hosts a documentation page detailing routes and methods for your reference.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
