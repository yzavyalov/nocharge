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
                <h2>API documantation</h2>
            </div>
        </div>
        <div class="row mb-4 mt-3 page-content">
            <div class="row">
                <div class="col">
                    <table>
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Registration</td>
                                <td>To register you need to contact us. After registration, you will receive a login, password and token.
                                    Your login and password will allow you to use your cabinet in the browser, and the token will need to be added to the headers as Bearer token with your request.</td>
                            </tr>
                            <tr>
                                <td>Test request</td>
                                <td>You can send email test@test.test in request without token on route http://no-charge.net/api/test, method get, parametr email.
                                    Before request don't foget encrypt email in SHA-256. </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
