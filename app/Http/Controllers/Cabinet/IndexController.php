<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = User::query()->find(Auth::id());


        if ($user->hasRole('redaktor'))
        {
            return view('cabinet.my.my-cabinet',compact('user'));
        }
        elseif ($user->hasRole('user-admin'))
        {
            return view('cabinet.admin.partner-cabinet',compact('user'));
        }
        elseif ($user->hasRole('user-employee'))
        {
            return view('cabinet.employee.employee-cabinet',compact('user'));
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

    public function packetPage()
    {
        return view('packets');
    }

}
