@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Useful links
@endsection
@section('description')
    In this section we collect useful links for our participants
@endsection
@section('img')
    {{ asset('img/Logo.png') }}
@endsection


@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>Useful links</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="row">
                    <div class="col-4"><b>Screen</b></div>
                    <div class="col-4"><b>Title</b></div>
                    <div class="col-4"><b>Description</b></div>
                </div>
                @foreach($links as $link)
                    <div class="row mt-2">
                        <div class="col-4"><a href="{{ $link->link }}"><img src="{{ $link->screen }}" alt="{{ $link->title }}"></a></div>
                        <div class="col-4"><a href="{{ $link->link }}">{{ $link->title }}</a></div>
                        <div class="col-4"><a href="{{ $link->link }}">{{ $link->description }}</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
