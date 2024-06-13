<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LudomanTransactionController extends Controller
{
    public function paymentRequest(Request $request)
    {
        dd($request);
    }

    public function callback(Request $request)
    {
        dd($request);
    }

}
