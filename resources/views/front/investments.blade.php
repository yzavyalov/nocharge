@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Investment Opportunity.
@endsection

@section('description')
    A quick opportunity to organize your own system for selecting an intermediary when making a payment.
@endsection

@section('img')
    {{ asset('img/photo_tetra_farm.jpg')}}
@endsection

@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>Investment Opportunity</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-4">
                    <img src="{{ asset('img/photo_tetra_farm.jpg') }}" alt="api" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-8">
                    <div class="text">
                        <p>In this section, we offer our members investment opportunities from our partners. Today, we are excited to present you with an opportunity to invest in a truly unique product.</p>

                        <h2><a href="https://tetra-farm.com?reff=yzavyalov"><b style="color: #0e76a8">About TETRA-FARM</b></a></h2>
                        <p>Our partners, the Swiss project <strong>TETRA-FARM</strong>, are a relatively new company with a share capital of 900,000 Swiss francs. In their first year of operation, they have achieved truly impressive results:</p>
                        <ul>
                            <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Established a full-cycle production system for growing medical cannabis. Their system includes the production of greenhouse lamps, greenhouses for cultivation, and their own clubs for distribution.</li>
                            <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Developed their own cannabis strain that complies with legal standards and was awarded the best strain in 2023.</li>
                            <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Created their own financing tool, an NFT token backed by real assets.</li>
                        </ul>

                        <h2><b>Token Sale</b></h2>
                        <p>Starting from <strong>May 26, 2024</strong>, active sales of tokens will begin. These tokens not only have their nominal value, which can fluctuate in market conditions, but also guarantee returns.</p>
                        <ul>
                            <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Price per token: 2,500 Swiss francs.</li>
                            <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Token backing: Each token is backed by one cannabis plant.</li>
                            <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Guaranteed return: The company guarantees a monthly return of 40 Swiss francs per token.</li>
                        </ul>

                        <h3>Investment Prospects</h3>
                        <p>The company is currently working on listing its tokens on online exchanges. Given the limited number of tokens and their backing by tangible assets, there is a high probability of an increase in nominal value.</p>
<b>
                        <h3>Exclusive Offer</h3>
                        <p>Our exclusivity: Only our association allows the purchase of tokens not through online purchase, but via bank transfer to the company's account. The investor and their tokens are then registered after the purchase, providing additional security for the transaction.</p>

    <p>If you are interested in this opportunity, please fill out the application form indicating your contact information and the number of tokens you wish to purchase.</p></b>
                    </div>
                    <div class="tetra-form">
                        <form method="post" action="{{ route('invest-form') }}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success-add-check'))
                                    <div class="alert alert-success" role="alert">
                                        <p>{{ session('success-add-check') }}</p>
                                    </div>
                                @endif
                            <div class="mb-3">
                                <label for="name" class="form-label" style="color: #007bff">What can I call you?</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #007bff">Your email for contact</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="quantity_tokens" class="form-label" style="color: #007bff">How many tokens are you going to buy?</label>
                                <select class="form-select" id="quantity_tokens" name="quantity_tokens">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Send a request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
