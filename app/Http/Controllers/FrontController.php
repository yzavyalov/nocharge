<?php

namespace App\Http\Controllers;

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
        return view('front.page');
    }

    public function api()
    {
        return view('front.api');
    }

    public function synergy()
    {
        $agent = new Agent();

        $visiter = [
            'ip' => \request()->ip(),
            'browser' => $agent->browser(),
            'agent' => $agent->getUserAgent(),
            'platform' => $agent->platform(),
        ];

        return view('gallery_page.synergy', compact('visiter'));
    }

    public function membership()
    {
        return view('front.frontmembership');
    }

    public function policy()
    {
        return view('front.policy');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function products()
    {
        return view('front.products');
    }
}
