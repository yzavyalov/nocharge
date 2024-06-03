<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestitionRequestRequest;
use App\Models\InvestitionRequest;
use Illuminate\Http\Request;

class InvestitionController extends Controller
{
    public function index()
    {
        $investors = InvestitionRequest::all();

        return $investors;
    }




    public function form(InvestitionRequestRequest $request)
    {
        $validated = $request->validated();

        InvestitionRequest::create($validated);

        return redirect()->back();
    }
}
