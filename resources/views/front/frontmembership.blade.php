@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Synergy of cooperation for online business.
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
                <h2>Membership</h2>
            </div>
        </div>

        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/server.png') }}" alt="membership" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-6">
                    <p>
                        Our system is a hub for communication among companies engaged in online business. The success of our system directly correlates with the success of each participant because active interaction between participants brings benefits to everyone involved. We also analyze other systems focused on preventing chargeback cases and incorporate their experiences.

                        Participation in our system starts at $250 per month, which is more cost-effective than hiring an employee and significantly less than the money you'll save by exchanging information with other participants.

                        It's important to note that your customers' data is not shared with other participants. Before storing them in our database, we encrypt the data using the SHA256 protocol. For example, the email <strong>test@test.com</strong> in the database looks like <strong>f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a</strong>. Most importantly, this protocol doesn't allow for reverse decryption of the data. Thus, even if someone hacks our database, they won't be able to obtain your users' emails. This operates solely in a data comparison mode.

                        You can cross-reference your data with our database both through your dashboard and via requests and responses to our API.

                        The system also includes a section on unscrupulous intermediaries. This information is accessible to all participants, and participants can add their comments to both their own messages and those of other system participants. This not only protects other participants from dishonest intermediaries but also gives you leverage over those intermediaries considering violating your agreements. Knowing that you can quickly spread negative information among other market participants.
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
