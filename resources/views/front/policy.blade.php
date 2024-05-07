@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Our Policy.
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
                <h2>Our Policy</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <p>Our policy is straightforward and clear, while the rules ensure a working environment that will absolutely give you the opportunity to avoid misunderstandings regarding partnerships on this platform. So, in short:</p>

                <ul>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">The strategy of this platform is aimed at maximizing results for all stakeholders.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Partnership policy entails mutually beneficial cooperation, built on a foundation of trust, responsibility, and maximum efficiency from collaboration.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">The platform is not responsible for the actions of its users, and users are not responsible for the platform's operation or the actions of its administrators.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Our platform is designed so that users do not transmit to us data received from third parties in an open and readable form. All email addresses or other data are stored in our database only after encryption using the SHA 256 protocol.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Platform users encrypt and operate data on our platform exclusively in the SHA 256 protocol.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Our goal is to be as helpful as possible in addressing issues specific to your activities and the challenges and risks inherent in your work.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">Our platform is a tool for exchanging information among its users and offers the opportunity to save users' resources through mutually beneficial information exchange.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">The foundation of our policy is the synergy of all platform participants, with the maximum benefit for all involved parties regardless of the field of activity.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">In the event that platform administrators become aware that a user is engaged in the production and sale of narcotics and weapons, the dissemination of illegal and immoral content, or other activities contrary to universal moral norms, we will be forced to terminate access to our platform for both the administrator and the employees of such a user. We also reserve the right not to refund any payments made by them.</li>
                    <li><img src="{{ asset('img/roundMarket.png') }}" style="width: 10px; padding-top: 10px; margin-right: 5px;" align="left">  If a user or users have posted information about your company (including negative information), it is the user's right to present information about their experience of cooperation with various partners. You can leave comments reflecting your point of view. The platform is not responsible for users' subjective opinions but allows for the sharing of information among users.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
