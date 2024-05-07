@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Synergy of cooperation for online business.
@endsection

@section('content')
    <div class="container">
        <div class="row mt-6 page-title">
            <div class="col">
                <h2>Synergy of information.</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                Your information.
            </div>
            <div class="row">
                <div class="col">
                    <table>
                        <tbody>
                            <tr>
                                <td>IP: </td>
                                <td>{{$visiter['ip']}}</td>
                            </tr>
                            <tr>
                                <td>Browser: </td>
                                <td>{{$visiter['browser']}}</td>
                            </tr>
                            <tr>
                                <td>Agent: </td>
                                <td>{{$visiter['agent']}}</td>
                            </tr>
                            <tr>
                                <td>Platform: </td>
                                <td>{{$visiter['platform']}}</td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td>If we know your email, we will be able to identify you quite accurately.</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>This and a number of other algorithms will allow us to identify an unreliable user before he can bring harm to your organization.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
