<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\MiddlemanTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ReviewSearchRequest;
use App\Models\Badbook\BadItem;
use App\Services\IframeService;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = BadItem::orderBy('created_at', 'desc')->paginate(10);

        $middlemanTypes = MiddlemanTypeEnum::toSelectArray();

        return view('cabinet.reviews-page',compact('reviews','middlemanTypes'));
    }


    public function create(ReviewRequest $request)
    {
        $validate = $request->validated();

        if (Auth::user()->hasRole('redaktor'))
            $ownerPartner = 1;
        else
            $ownerPartner = session()->get('partner_id');

        $validate['partner_id'] = $ownerPartner;

        if ($validate['link'])
        {
            $a = ReviewService::checkBadItemInBase($validate);
            $linkData = IframeService::getData($validate['link']);

            $validate['description'] = $linkData['description'];

            $validate['image'] = $linkData['thumbnail_url'];

            $validate['name'] ?: $validate['name'] = $linkData['title'];
        }

        $review = BadItem::create($validate);

        return redirect()->route('index-review');
    }


    public function select(ReviewSearchRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(\App\Http\Filters\BadItemsFilter::class, ['queryParams' => $data]);

        $query = BadItem::query();

        if (!empty($data)) {
            $query->filter($filter);
        }

        $reviews = $query->orderBy('created_at', 'desc')->paginate(10);

        $middlemanTypes = MiddlemanTypeEnum::toSelectArray();

        return view('cabinet.reviews-page',compact('reviews','middlemanTypes'));
    }


    public function show($id)
    {
        $review = BadItem::query()->find($id);

        $middlemanTypes = MiddlemanTypeEnum::toSelectArray();

        return view('cabinet.reviews-comments-page',compact('review','middlemanTypes'));
    }

}
