@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    About our system.
@endsection

@section('content')
    <div class="container about">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>About our system</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                <div class="col-6 mb-3">
                    <img src="{{asset('img/output_2784568585_0.jpg')}}" class="first-image">
                </div>
                <div class="col partners">
                    <img src="{{ asset('img/roundMarket.png') }}" style="width: 15px; padding-top: 5px; margin-right: 5px;" align="left">
                    <ul id="partners"><b>Our partners</b>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Online casino</li>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Traders clubs</li>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Dating sites</li>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Payment system providers</li>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Online services</li>
                    </ul>
                    <p id="slogan-one"><b>Every year our partners lost thousands of dollars due to chargebacks and unscrupulous partners</b></p>
                    <div class="row">
                        <div class="col">
                            <div class="col protection">
                                <img src="{{ asset('img/roundYellow.png') }}" style="width: 15px; padding-top: 5px; margin-right: 5px;" align="left">
                                <ul><b>Data protection</b>
                                    <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">data is transmitted only in encrypted form</li>
                                    <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">only system participants can check data</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('img/crypt.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-center" id="title-how"><b>How our system works.</b></h3>
            <img src="{{asset('img/Shema.png')}}" alt="">
            <ol>
                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">The player selects a casino and registers on its website.</li>
                <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">Pays and receives the service.</li>
                <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">After that, he writes either to the casino or to the bank and writes a request for a refund.</li>
                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">The casino enters this player into our system.
                    In this case, data is transmitted and stored only in encrypted form.</li>
                <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">The player is looking for a new casino to repeat his algorithm.</li>
                <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">When registering or accepting payment, the casino checks the player and makes a decision to refuse to provide the service.</li>
            </ol>
            <b><img src="{{ asset('img/roundRed.png') }}" style="width: 15px; padding-top: 5px; margin-right: 5px;" align="left">Member Benefits:</b>
            <ul>
                <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Cost reduction;</li>
                <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Reducing problems with partners (payment systems);</li>
                <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">A strong argument when working with payment intermediaries;</li>
            </ul>
            <a class="btn btn-bd-primary" href="{{asset('storage/Blacklist.pptx')}}" id="presentation">Download presentation</a>
        </div>
    </div>
@endsection
