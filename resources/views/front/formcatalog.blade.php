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
        <div class="row">
            <table>
                @foreach($catalogItems as $item)
                    <tr>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->link }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->conditions }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
