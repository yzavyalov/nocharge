<?php

namespace App\Services;


use App\Models\Badbook\BadItem;
use App\Models\Badbook\ReviewStatus;
use Illuminate\Support\Facades\Auth;

class ReviewConfirmService
{
    public static function addConfirm($idBadItem)
    {
        $checkReview = BadItem::query()->find($idBadItem);

        $grade = -1;

//        if ($checkReview->partner_id != PartnerService::getIdCurrentParnter(Auth::id()))
//        {
            $check = self::checkPartnerReview($checkReview);

            if ($check)
                self::updateReviewStatus($check,$grade);
            else
                self::createReviewStatus($checkReview,$grade);

            self::changeReviewStatus($checkReview);
//        }
    }

    public static function antiConfirm($idBadItem)
    {
        $checkReview = BadItem::query()->find($idBadItem);

            $grade = 1;

            $check = self::checkPartnerReview($checkReview);

            if ($check)
                self::updateReviewStatus($check,$grade);
            else
                self::createReviewStatus($checkReview,$grade);

            self::changeReviewStatus($checkReview);
    }

    public static function changeReviewStatus($review)
    {
        $sum = $review->statuses()->latest()->first()->sum;

        if ($review)
        {
            if($sum < 0)
                $review->status = 1;
            else
                $review->status = 0;

            $review->save();
        }
    }

    public static function createReviewStatus($checkReview,$grade)
    {
         $newReviewStatus = $checkReview->statuses()->create([
            'partner_id'=>PartnerService::getIdCurrentParnter(Auth::id()),
            'grade' => $grade,
            'sum'=> self::updateSum($checkReview->id,$grade),
        ]);
    }

    protected static function updateSum($idBadItem, $grade)
    {
        $badItem = BadItem::query()->find($idBadItem);

        if ($badItem)
        {
            $lastStatus = $badItem->statuses()->latest()->first();

            if ($lastStatus)
                $sum = $lastStatus->sum + $grade;
            else
                $sum = $grade;
        }
        else
        {
            $sum = $grade;
        }

        return $sum;
    }

    public static function checkPartnerReview($checkReview)
    {
        $partnerId = PartnerService::getIdCurrentParnter(Auth::id());

        $check = $checkReview->statuses->where('partner_id',$partnerId)->first();

        if ($check)
            return $check;
        else
            return false;
    }

    public static function updateReviewStatus($check,$grade)
    {
        $oldGrade = $check->grade;

        $check->update([
            'bad_item_id' => $check->bad_item_id,
            'partner_id' => PartnerService::getIdCurrentParnter(Auth::id()),
            'grade' => $grade,
            'sum' => self::updateSum($check->bad_item_id,$grade)-$oldGrade,
        ]);

        $lastReview = ReviewStatus::latest()->first();

        $lastReview->update([
            'sum' => self::lastSum(),
        ]);
    }

    public static function lastSum()
    {
        $lastSum = ReviewStatus::all()->pluck('grade')->sum();

        return $lastSum;
    }
}
