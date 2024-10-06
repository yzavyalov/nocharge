<?php

namespace App\Http\Controllers;

use App\Enums\MiddlemanTypeEnum;
use App\Http\Controllers\Cabinet\ReviewController;
use App\Http\Requests\ReviewSearchRequest;
use App\Models\Badbook\BadItem;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $reviews = BadItem::where('status',1)->orderBy('created_at', 'desc')->paginate(10);

        $middlemanTypes = MiddlemanTypeEnum::toSelectArray();

        return view('front.formcatalog',compact('reviews','middlemanTypes'));
    }


    public function selectFrontRevie(ReviewSearchRequest $request)
    {
        $select  = new ReviewController();

        return $select->select($request,'front.formcatalog');
    }

    public function store()
    {
        dd('werw');
    }
}
