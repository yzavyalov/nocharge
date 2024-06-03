<?php

namespace App\Http\Controllers;

use App\Models\UsefulLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class FrontController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('front.association');
    }

    public function membership()
    {
        return view('front.frontmembership');
    }
    public function ourMembers()
    {
        return view('front.partication');
    }

    public function noFrodSystem()
    {
        return view('front.page');
    }

    public function rewiewsSystem()
    {
        return view('front.rewiewSystem');
    }

    public function ludomanSystem()
    {
        return view('front.ludomania');
    }

    public function ludoOffer()
    {
        return view('front.ludooffer');
    }

    public function cascadSystem()
    {
        return view('front.cascade-system');
    }

    public function api()
    {
        return view('front.api');
    }

    public function catalog()
    {
        return view('front.catalog');
    }

    public function protectionData()
    {
        return view('front.protection');
    }

    public function links()
    {
        $links = UsefulLink::all();

        return view('front.links',compact('links'));
    }



    public function policy()
    {
        return view('front.policy');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function investments()
    {
        return view('front.investments');
    }

    public function terms()
    {
        return view('front.terms');
    }


}
