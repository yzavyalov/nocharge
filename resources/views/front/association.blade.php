@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    About our system.
@endsection

@section('description')
    With over 5 years of experience in handling payment systems within the realm of high-risk business, we've witnessed firsthand the challenges faced by industry stakeholders in facilitating client transactions.
@endsection

@section('img')
    {{ asset('img/output_2784568585_0.jpg')}}
@endsection

@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>About our system</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                <div class="col" id="bigImage">
                    <img src="{{asset('img/output_2784568585_0.jpg')}}" class="first-image">
                </div>
                <div class="col">
                    <text>
                        Greetings. With over 5 years of experience in handling payment systems within the realm of high-risk business, we've witnessed firsthand the challenges faced by industry stakeholders in facilitating client transactions. Two interconnected issues have emerged, costing participants significant financial losses:
                    </text>
                    <ul>
                        <li>
                            <b>Primary Traffic:</b> One pressing concern revolves around the initial influx of clientele. Payment systems are often reluctant to onboard customers lacking prior successful interactions with their platforms. These unfamiliar clients pose a risk of lodging complaints with financial institutions, potentially triggering repercussions for all transaction participants, manifesting in hefty penalties. Nonetheless, there's a necessity to accommodate them, given the presence of prospective "new" clients who later engage seamlessly with the business.
                        </li>
                        <li>
                            <b>Unscrupulous Payment Intermediaries:</b> Another recurring obstacle pertains to dishonest payment intermediaries. Frequently, despite businesses generating revenue through legitimate means by investing in traffic acquisition, client servicing, and offering a comprehensive suite of services, the funds fail to reach their intended recipients due to untrustworthy middlemen. These intermediaries may devise various excuses and pretexts to withhold part or all of the funds from the business, sometimes absconding with substantial sums.
                        </li>
                    </ul>



                    In response, we've resolved to establish our organization aimed at mitigating, if not entirely circumventing, these challenges and minimizing associated losses. We recognize that the crux of resolving these issues lies within the hands of the business itself. Facilitating high-quality information exchange holds the key to:
                    <ul>
                        <li><b>Reducing Chargebacks and Refunds:</b> By minimizing interactions with clients predisposed to engaging in chargebacks and refunds (where a client may dispute a transaction), businesses can curtail losses. What may be a new client for you might not be for someone else.</li>
                        <li><b>Avoiding Collaboration with Unreliable Intermediaries:</b> Proactively vetting and exchanging information can help circumvent partnerships with dubious payment intermediaries during transaction organization.</li>
                        <li><b>Exerting Leverage on Intermediaries:</b> Establishing robust communication channels enables businesses to exert pressure on intermediaries who contemplate fraudulent activities, potentially persuading them to adhere to agreed-upon terms of collaboration.</li>
                    </ul>





                </div>
            </div>
        </div>
    </div>
@endsection
