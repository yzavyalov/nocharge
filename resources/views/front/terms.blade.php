@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Our terms.
@endsection
@section('description')
    Our public terms of service
@endsection
@section('img')
    {{ asset('img/Logo.png') }}
@endsection

@section('content')
    <div class="container about">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>Terms.</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                Terms of Service for the website https://iafs.info/
                <ul>
                    <li>
                        General Provisions
                        <ul>
                            <li>This Terms of Service agreement (hereinafter referred to as the "Agreement") regulates the relationship between the administration of the website https://iafs.info/ (hereinafter referred to as the "Site") and its users (hereinafter referred to as the "Users").</li>
                            <li>The use of the Site implies the unconditional acceptance by the User of all the terms of this Agreement.</li>
                        </ul>
                    </li>
                    <li>
                        Subject Matter of the Agreement
                        <ul>
                            <li>The Site Administration provides Users with access to the information posted on the Site in accordance with the terms of this Agreement.</li>
                            <li>The User undertakes to be responsible for the confidentiality of their account credentials, as well as for all actions taken under their account.</li>
                        </ul>
                    </li>
                    <li>
                        Rights and Obligations of the Parties
                        <ul>
                            <li>The Site Administration undertakes to provide Users with access to the information on the Site.</li>
                            <li>The User undertakes to use the information posted on the Site solely for lawful purposes.</li>
                        </ul>
                    </li>
                    <li>
                        Liability of the Parties
                        <ul>
                            <li>The Site Administration shall not be liable for any losses or damages, direct or indirect, arising from the use or inability to use the information on the Site.</li>
                            <li>The User is responsible for any actions taken by them on the Site.</li>
                        </ul>
                    </li>
                    <li>
                        Dispute Resolution
                        <ul>
                            <li>All disputes and disagreements arising between the parties in connection with the execution of this Agreement shall be resolved through negotiations.</li>
                        </ul>
                    </li>
                    <li>
                        Final Provisions
                        <ul>
                            <li>This Agreement shall enter into force upon its acceptance by the User and shall remain in effect until terminated.</li>
                            <li>The Site Administration reserves the right to amend this Agreement without notifying the Users.</li>
                        </ul>
                    </li>
                </ul>

                This Terms of Service agreement has been drafted in English and may be translated into other languages. In the event of any discrepancy in the interpretation of the terms of this Agreement between the English version and versions in other languages, the English version shall prevail.

                Remember, before using such a Terms of Service agreement, it's best to consult with a lawyer to ensure it meets all your requirements and regulatory standards.
            </div>
        </div>
    </div>
@endsection
