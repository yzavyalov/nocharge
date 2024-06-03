<?php

namespace App\Services;

use App\Models\Badbook\BadItem;

class ReviewService
{
    public static function checkBadItemInBase($validate)
    {
        $badItem = BadItem::query()->where('link',$validate['link'])->first();
        dd($badItem);
    }
}
