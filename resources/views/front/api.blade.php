@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Synergy of cooperation for online business.
@endsection

@section('content')
    <div class="container">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>API documantation</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('img/api_image.png') }}" alt="">
                </div>
                <div class="col">
                    <p>Our system empowers users to leverage its functionality both through the company dashboard on the website and via API. This enables our participants to conduct transaction checks without visiting our site, seamlessly integrating the verification process into their own workflows. To utilize our API, you need to register, proceed to set up your company in the dashboard, and acquire an authorization token. Additionally, our dashboard hosts a documentation page detailing routes and methods for your reference.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
