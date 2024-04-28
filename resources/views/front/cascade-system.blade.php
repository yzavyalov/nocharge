@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Cascading payment management system.
@endsection

@section('description')
    A quick opportunity to organize your own system for selecting an intermediary when making a payment.
@endsection

@section('img')
    {{ asset('img/cascaad.png')}}
@endsection

@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>Cascading payment management system</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/cascaad.png') }}" alt="api" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-6">
                    <p>Today, we are contemplating a system that will empower our participants to tailor their payment processing according to their preferences, enabling the system to select the optimal intermediary based on criteria set by the participant. Importantly, we will refrain from tracking actual transaction volumes or imposing any restrictions on their activities. Instead, leveraging predetermined criteria and our database, we aim to assist participants in conducting payments through the most cost-effective and secure channels available.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
