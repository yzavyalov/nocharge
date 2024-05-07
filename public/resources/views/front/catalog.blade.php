@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Catalogue.
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
                <h2>Catalogue.</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/catalog.png') }}" alt="api" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-6">
                    <p>In the near future, we will launch an internet robot that will navigate through links and discover company websites. These companies will be categorized, offering website owners the opportunity to enhance the information they wish to convey to their clients. This will enable our participants to swiftly locate the partners they need, improving the search ranking of their websites. Within our catalogue, companies will be categorized by service offerings and markets, streamlining our participants' expenses for payment organization when entering new markets. Today, we are already working on this section of our website and will soon offer it to our participants.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
