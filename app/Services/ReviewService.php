<?php

namespace App\Services;

use App\Models\Badbook\BadItem;
use App\Models\Badbook\ConnectReview;
use Illuminate\Support\Facades\Auth;

/**
 * @property CommentService $commentService
 */
class ReviewService
{
    public static function connetctRewiews($mainId,$secondaryId)
    {
        $checkChain = ConnectReview::query()
            ->where('main_bad_item_id',$mainId)
            ->where('secondary_bad_item_id',$secondaryId)
            ->get();

        if (!$checkChain)
        {
            ConnectReview::create([
                'main_bad_item_id' => $mainId,
                'secondary_bad_item_id' => $secondaryId,
            ]);
        }
    }

    public static function chainChecked($validate)
    {
        $dbLinkItems = BadItem::query()
            ->where('link',$validate['link'])
            ->get();

        if (!empty($dbLinkItems))
        {
            $firstIteration = true;

            foreach ($dbLinkItems as $linkItem)
            {
                if ($firstIteration)
                {
                    $mainId = $linkItem['id'];

                    $firstIteration = false;
                }
                else
                {
                    self::connetctRewiews($mainId,$linkItem['id']);
                }
            }
        }

    }

    public static function getAllBadItems()
    {
        $reviews = BadItem::all();

        $items = $reviews->map(function($review) {
            return [
                'id' => $review->id,
                'name' => $review->name
            ];
        })->toArray();

        return $items;
    }

    public static function checkBadItemIbDB($validate)
    {
        $query = BadItem::query();
        if (!empty($validate['link']))
            $query->where('link',$validate['link']);

        if (!empty($validate['name']))
            $query->where('name',$validate['name']);

        $badItems = $query->first();

        if (!empty($badItems))
            return $badItems;
        else
            return null;
    }

    public static function createBadItem($validate)
    {
        if ($validate['link'])
        {
            if(!IframeService::fourhundredfour($validate['link']))
            {
                $linkData = IframeService::getData($validate['link']);

                $validate['description'] = $linkData['description'];

                $validate['image'] = $linkData['thumbnail_url'];

                $validate['name'] ?: $validate['name'] = $linkData['title'];
            }
        }

        BadItem::create($validate);
    }


    public static function createComment($validate, $checkBadItem)
    {
        $commentService = app(CommentService::class);

        $commentService->createComment($checkBadItem->id,$checkBadItem->partner_id,Auth::id(),$validate['name'].'//'.$validate['link'].'//'.$validate['text']);
    }
}
