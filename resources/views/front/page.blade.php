@extends('template.template')
@section('title')
    Synergy of cooperation for online business.
@endsection

@section('content')
    <div class="container">
        <div class="row mt-6 page-title">
            <div class="col">
                <h2 class="card-title">Blacklist exchange system for online product company</h2>
            </div>
        </div>
        <div class="row mb-4 page-content">
            <img src="{{asset('img/exchange.png')}}">
            <ul>Our partners:
                <li>Online casino</li>
                <li>Traders clubs</li>
                <li>Dating sites</li>
                <li>Payment system providers</li>
                <li>Online services</li>
            </ul>
            <p>Every year our partners lost thousands of dollars due to chargebacks and unscrupulous partners</p>
            <h3>Data protection</h3>
            <ul>
                <li>data is transmitted only in encrypted form</li>
                <img src="{{asset('img/crypt.png')}}" alt="">
                <li>only system participants can check data</li>
            </ul>
            <h3>How our system works.</h3>
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
            <h3>Member Benefits:</h3>
            <ul>
                <li>Cost reduction;</li>
                <li>Reducing problems with partners (payment systems);</li>
                <li>A strong argument when working with payment intermediaries;</li>
            </ul>
            <h4>Contact us: 8540462@gmail.com</h4>
            <a href="{{asset('storage/Blacklist.pptx')}}">Download presentation</a>
        </div>
    </div>
@endsection
