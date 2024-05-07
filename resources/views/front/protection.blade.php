@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Protection of user personal data
@endsection

@section('img')
    {{ asset('img/Logo.png') }}
@endsection


@section('description')
    Analysis of the protection of the possibility of transferring data to third parties
@endsection



@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>Protection of user personal data</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="py-12">
                    <div class="container">
                    <div class="row">
                        Almost all countries in the world (including the USA) have enacted legislation regarding personal data protection. This legislation is predominantly based on Regulation (EU) 2016/679 of the European Parliament and of the Council of 27 April 2016 on the protection of individuals concerning the processing of personal data and on the free movement of such data, and repealing Directive 95/46/EC (General Data Protection Regulation).

                        According to Articles 4(1) and 4(2) of this regulation:

                        (1) "personal data" means any information relating to an identified or identifiable natural person ('data subject'); an identifiable natural person is one who can be identified, directly or indirectly, in particular by reference to an identifier such as a name, an identification number, location data, an online identifier, or one or more factors specific to the physical, physiological, genetic, mental, economic, cultural, or social identity of that natural person;

                        (2) "processing" means any operation or set of operations which is performed on personal data or on sets of personal data, whether or not by automated means, such as collection, recording, organization, structuring, storage, adaptation or alteration, retrieval, consultation, use, disclosure by transmission, dissemination or otherwise making available, alignment or combination, restriction, erasure, or destruction;

                        Thus, we understand that the data provided by our participants falls under the definition of "personal data," and our activities may be considered "processing."

                        According to Article 6(1) of the regulation, processing is lawful only if at least one of the following conditions is met:

                        (a) the data subject has given consent to the processing of his or her personal data for one or more specific purposes;

                        In connection with this, we recommend that all our participants include in their agreements with clients a clause consenting to the transfer of their data, including email addresses, IP addresses, and browser header data, to third parties for the purpose of collecting statistical data and analyzing client inquiries to other market participants.

                        According to Article 6(4) of the same Article - If processing for a purpose other than that for which the personal data were collected is not based on the data subject's consent or on Union or Member State law which constitutes a necessary and proportionate measure in a democratic society to safeguard the objectives referred to in Article 23(1), the controller shall, in order to ascertain whether processing for another purpose is compatible with the purpose for which the personal data were originally collected, take into account, inter alia:

                        (a) any link between the purposes for which the personal data were collected and the purposes of the intended further processing;

                        (b) the context in which the personal data have been collected, in particular regarding the relationship between data subjects and the controller;

                        (c) the nature of the personal data, in particular whether special categories of personal data are processed in accordance with Article 9 or whether personal data related to criminal convictions and offenses are processed in accordance with Article 10;

                        (d) the possible consequences of the intended further processing for data subjects;

                        (e) the existence of appropriate safeguards, which may include encryption or pseudonymization.

                        In our system, data is encrypted using the SHA256 protocol.
                    </div>
                    </br>
                    <div>
                     <strong>   Example from case law: Most such (published) legal proceedings were brought against credit institutions, as paying customers complained about reports to the Credit Bureau with a negative credit rating. Essentially, the plaintiffs asked to have their data removed from the Credit Bureau database (before the expiration of the retention period applicable to the Credit Bureau system). The plaintiffs claimed that the "right to be forgotten" applies to them in relation to such processing. Courts typically reject such claims as unfounded, stating that the right to be forgotten does not apply in such cases, as there is a predominant legitimate interest of Credit Bureau system participants to have access to information about the payment behavior of credit institution customers.

                        Therefore, we believe that our activities do not violate user data protection legislation. We encrypt data upon receipt and storage. Additionally, our system ensures the predominant legitimate interest of system participants to have access to information about the payment behavior of clients.
                     </strong>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
