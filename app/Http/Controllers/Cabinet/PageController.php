<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\MiddlemanTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Badbook\BadItem;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('cabinet.pages.about-in-cabinet');
    }

    public function membership()
    {
        return view('cabinet.pages.membership-in-cabinet');
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

    public function contact()
    {
        return 'dfdf';
    }
}
