<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('redaktor'))
        {
            return view('cabinet.my.my-cabinet');
        }
        elseif (Auth::user()->hasRole('user-admin'))
        {
            return redirect()->route('page-partner',Auth::user()->partners->first()->id);
        }
        elseif (Auth::user()->hasRole('user-employee'))
        {
            return view('dashboard');
        }
        else
        {
            return view('dashboard');
        }
    }

    public function cabinetIndex()
    {
        return view('cabinet.my.my-cabinet');
    }

    public function companyForm()
    {
        return view('dashboard.companyForm');
    }

}
