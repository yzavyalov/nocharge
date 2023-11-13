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
            <div class="col">
                <h2>Blacklist exchange system for online product company</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                <div class="col-6 mb-3">
                    <img src="{{asset('img/exchange.png')}}" class="first-image">
                </div>
                <div class="col">
                    <ul id="partners">Our partners
                        <li>Online casino</li>
                        <li>Traders clubs</li>
                        <li>Dating sites</li>
                        <li>Payment system providers</li>
                        <li>Online services</li>
                    </ul>
                    <p id="slogan-one">Every year our partners lost thousands of dollars due to chargebacks and unscrupulous partners</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5 protection">
                    <h3>Data protection</h3>
                    <ul>
                        <li>data is transmitted only in encrypted form</li>
                        <li>only system participants can check data</li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{asset('img/crypt.png')}}" alt="">
                </div>
            </div>
            <h3 class="text-center" id="title-how">How our system works.</h3>
            <img src="{{asset('img/Shema.jpg')}}" alt="">
            <ol>
                <li>The player selects a casino and registers on its website.</li>
                <li>Pays and receives the service.</li>
                <li>After that, he writes either to the casino or to the bank and writes a request for a refund.</li>
                <li>The casino enters this player into our system.
                    In this case, data is transmitted and stored only in encrypted form.</li>
                <li>The player is looking for a new casino to repeat his algorithm.</li>
                <li>When registering or accepting payment, the casino checks the player and makes a decision to refuse to provide the service.</li>
            </ol>
            <h3 id="title-benefits">Member Benefits:</h3>
            <ul>
                <li>Cost reduction;</li>
                <li>Reducing problems with partners (payment systems);</li>
                <li>A strong argument when working with payment intermediaries;</li>
            </ul>
            <a href="{{asset('storage/Blacklist.pptx')}}" id="presentation">Download presentation</a>
        </div>
    </div>
@endsection
