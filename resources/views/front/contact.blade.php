@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Contacts.
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
