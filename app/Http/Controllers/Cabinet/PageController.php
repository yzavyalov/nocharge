<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\MessageTypeEnum;
use App\Enums\MiddlemanTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Badbook\BadItem;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function about()
    {
        return view('cabinet.pages.about-in-cabinet');
    }

    public function membership()
    {
//        return view('cabinet.pages.membership-in-cabinet');
        return redirect()->route('packet-page');
    }

    public function apidocumentation()
    {
        return view('cabinet.pages.membership-in-cabinet');
    }

    public function blackList()
    {
        if (session()->has('partner_id'))
        {
            $reviews = BadItem::query()->orderBy('created_at', 'desc')->paginate(10);

            $middlemanTypes = MiddlemanTypeEnum::toSelectArray();

            return view('cabinet.reviews-page',compact('reviews','middlemanTypes'));
        }
        else
        {
            return view('cabinet.pages.blacklist-in-cabinet');
        }

    }

    public function apiDocumantation()
    {
        return view('cabinet.pages.api');
    }

    public function contact()
    {
        $user = Auth::user();

        $messageTypes = MessageTypeEnum::toSelectArray();

        if ($user->hasRole('redaktor'))
        {
            $messages = Message::orderBy('created_at','DESC')->paginate(15);

            return view('cabinet.my.my-contact',compact('messages','messageTypes'));
        }
        else
        {
            return view('cabinet.pages.contact-in-cabinet',compact('user','messageTypes'));
        }
    }

    public function policy()
    {
        return view('cabinet.pages.policy');
    }
}
