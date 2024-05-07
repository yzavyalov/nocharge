@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Cost of participation.
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
                <h2>Cost of participation</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="py-12">
                    <div class="container">
                        <!-- Блок 1 -->
                        <div class="row">
                            {{--                <div class="col-md-6">--}}
                            {{--                    <div class="rounded-lg bg-white p-4 text-center" style="border:5px solid blue;">--}}
                            {{--                        <h3 class="text-lg font-semibold mb-3">Free - One Month</h3>--}}
                            {{--                        <p>Upload your email database containing clients, who have initiated chargebacks or refunds on your website.</p>--}}
                            {{--                        <button class="btn btn-primary mt-3">Free 1 month</button>--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}
                            <!-- Блок 2 -->
                            <div class="col-md-4">
                                <div class="rounded-lg bg-white p-4 text-center" style="border:5px solid green;">
                                    <h3 class="text-lg font-semibold mb-3">300 USDT for 1 Month</h3>
                                    <p>You can pay on a monthly basis. Uploading your database of unreliable users enables all colleagues to avoid another issue.</p>
                                    <button class="btn btn-success mt-3">Pay 1 month</button>
                                </div>
                            </div>
                            {{--            </div>--}}

                            <!-- Блок 3 -->
                            {{--            <div class="row mt-4">--}}
                            <div class="col-md-4">
                                <div class="rounded-lg bg-white p-4 text-center"  style="border:5px solid orange;">
                                    <h3 class="text-lg font-semibold mb-3">850 USDT for 3 Months</h3>
                                    <p>If you pay for 3 months upfront, you receive a benefit of 50 USDT. Participation in our system allows participants to save.</p>
                                    <button class="btn btn-warning mt-3">Pay 3 months</button>
                                </div>
                            </div>
                            <!-- Блок 4 -->
                            <div class="col-md-4">
                                <div class="rounded-lg bg-white p-4 text-center" style="border:5px solid red;">
                                    <h3 class="text-lg font-semibold mb-3">3000 USDT for 12 Months</h3>
                                    <p>Paying for your annual participation allows you to save 600 USDT upfront. Participation in our system allows participants to save.</p>
                                    <button class="btn btn-danger mt-3">Pay 12 months</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Горизонтальный блок -->
                <div class="py-12">
                    <div class="container mt-3">
                        <div class="row-fluid justify-content-center">
                            <div>
                                <div class="rounded-lg bg-white p-4 text-center" style=" border: 4px solid;
    border-image: linear-gradient(to right,
        blue 25%,  /* Синий цвет на 25% */
        blue 50%,  /* Синий цвет на 50% */
        green 50%, /* Зелёный цвет на 50% */
        green 75%, /* Зелёный цвет на 75% */
        orange 75%, /* Жёлтый цвет на 75% */
        orange 100% /* Жёлтый цвет на 100% */
    ) 1;">
                                    <p>Active participation in our program involves providing information about users who abuse refund policies, as well as details about intermediaries engaged in deception and theft of your money. This will help other participants avoid encounters with such individuals and spare you from potential issues with those flagged by other members of the system.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
