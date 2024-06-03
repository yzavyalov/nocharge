@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    System for verifying user data in ludomaniac registries.
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
                <h2>Enter your details and our partners will see that you are struggling with gambling addiction</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/ludomania.jpg') }}" alt="ludomania" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-6">
                    <p>Today, numerous countries are engaged in the establishment of a registry for individuals with gambling addiction. On our part, we are actively collaborating with these registries, as well as with authorities identifying political figures. When our participant requests a user verification, if we identify them as being listed in the gambling addiction registry, we disclose this information in our response.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#">I'm ludoman</a>
                </div>
            </div>
        </div>
    </div>
@endsection
