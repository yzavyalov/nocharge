@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    About our system.
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
    <div class="container about">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>About our system</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                <div class="col" id="bigImage">
                    <img src="{{asset('img/output_2784568585_0.jpg')}}" class="first-image">
                </div>
                <div class="col">
                    <div class="row partners">
                        <div class="col">
                            <div class="secondTitle">Our partners</div>
                            <ul id="partners">
                                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Online casino</li>
                                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Traders clubs</li>
                                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Dating sites</li>
                                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Payment system providers</li>
                                <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Online services</li>
                            </ul>
                        </div>
                        <div class="col">
                            <img src="img/arms.png" alt="">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p id="slogan-one"><b>Annually, our partners were losing thousands of dollars due to chargebacks and unscrupulous partners.</b></p>
                    </div>
                    <div class="row mt-4 dataProtection">
                        <div class="col">
                            <img src="img/protection.png" alt="Data protection">
                        </div>
                        <div class="col">
                            <div class="secondTitle">Data protection</div>
                                <ul>
                                    <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">data is transmitted only in encrypted form</li>
                                    <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">only system participants can check data</li>
                                </ul>
                            </div>
                    </div>
                    <div class="row">
                       <div class="col">
                          <img src="{{asset('img/sha256.png')}}" alt="">
                       </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="text-center secondTitle mt-4" id="title-how">How our system works</h3>
            </div>
            <div class="row">
                <img src="{{asset('img/Shema.png')}}" alt="">
            </div>
            <div class="row bg-gray">
                <div class="col">
                    <ol>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">The player selects a casino and registers on its website.</li>
                        <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">Pays and receives the service.</li>
                        <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">After that, he writes either to the casino or to the bank and writes a request for a refund.</li>
                        <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">The casino enters this player into our system.
                            In this case, data is transmitted and stored only in encrypted form.</li>
                        <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">The player is looking for a new casino to repeat his algorithm.</li>
                        <li><img src="{{ asset('img/roundYellow.png') }}" style="width: 10px; padding-top: 5px; margin-right: 10px;" align="left">When registering or accepting payment, the casino checks the player and makes a decision to refuse to provide the service.</li>
                    </ol>
                </div>
                <div class="col-3 rectangle">
                    <img src="img/Rectangle.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="secondTitle">Member Benefits</div>
                    <ul>
                        <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Cost reduction;</li>
                        <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Reducing problems with partners (payment systems);</li>
                        <li><img src="{{ asset('img/roundRed.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">A strong argument when working with payment intermediaries;</li>
                    </ul>
                </div>
                <div class="col" id="presantation">
                    <a class="btn btn-secondary" href="{{asset('storage/Blacklist.pptx')}}" id="presentation">Download presentation</a>
                </div>
            </div>
        </div>
    </div>
@endsection
