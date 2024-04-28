@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Contacts.
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
                <h2>Contacts</h2>
            </div>
        </div>

        <div class="row">
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Head of the department for work with partners - <strong><a href="mailto:ang@iafs.info">ang@iafs.info</a></strong></li>
                                    <li class="list-group-item">For companies involved in gaming business - <strong><a href="mailto:casino@iafs.info">casino@iafs.info</a></strong></li>
                                    <li class="list-group-item">For companies involved in the forex market - <strong><a href="mailto:forex@iafs.info">forex@iafs.info</a></strong></li>
                                    <li class="list-group-item">Technical questions - <strong><a href="mailto:administrator@iafs.info">administrator@iafs.info</a></strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
