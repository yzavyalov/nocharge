@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Reviews of unscrupulous mediators.
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
                <h2>Reviews of unscrupulous mediators</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/rewiews.png') }}" alt="api" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-6">
                    <p>During the process of accepting payments from users, it is inevitable to engage intermediaries. Typically, these include banks, payment systems, and other entities that facilitate this process. These intermediaries not only oversee the flow of funds passing through them but also transfer their clients' money through their accounts. In an ideal collaboration, intermediaries retain a commission as agreed upon in the contract. However, there are unscrupulous intermediaries who, when it comes time to transfer funds to their clients, either disappear or concoct additional fees and penalties to extract more money from their clients. We propose that our participants exchange information about such intermediaries. This will enable your colleagues to avoid engaging with such clients. Furthermore, if an intermediary decides to impose additional fines and commissions not specified in the contract, you can argue that you will include them in our database, which will impact their future operations. Perhaps this will help avoid additional expenses.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
