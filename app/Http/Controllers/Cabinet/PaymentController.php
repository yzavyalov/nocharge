<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\PaymentTypeEnum;
use App\Enums\TokenTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use App\Models\Partners;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment($count)
    {
        return view('cabinet.admin.payment-create',compact('count'));
    }

    public function savePayment($count)
    {
        switch ($count)
        {
            case 0:
                $sum = 0;
                break;
            case 1:
                $sum = 300;
                break;
            case 3:
                $sum = 850;
                break;
            case 12:
                $sum = 3000;
                break;
        }
        $partner_id = session()->get('partner_id');

        $payment = new Payment();
        $payment->partner_id = $partner_id;
        $payment->sum = $sum;
        $payment->currency = 'usd';
        $payment->status = PaymentTypeEnum::TEST_PERIOD;
        $payment->save();

        $token = new TokenController();
        $token->create($partner_id);

        return redirect()->route('page-partner',$partner_id);
    }

    public function oncheck($id)
    {
        $payment = Payment::query()->find($id);

        if ($payment->status == PaymentTypeEnum::TEST_PERIOD || $payment->status == PaymentTypeEnum::UNPAID)
        {
            $payment->update([
                'status' => PaymentTypeEnum::CHECK,
            ]);
        }

        return redirect()->back();
    }


    public function delete($id)
    {
        $payment = Payment::query()->find($id);

        $payment->delete();

        return redirect()->route('office');
    }

    public function paidPayment($id)
    {
        $payment = Payment::query()->find($id);

        $partner = Partners::query()->find($payment->partner_id);

        $token = $partner->currentTocken->first();

        $finishDate = Carbon::parse($token->finish_date);

            $payment->update(['status' => PaymentTypeEnum::PAID]);

            $payment->save();

            switch ($payment->sum){
                case 0:
                    if ($partner->payments->where('sum',0)->where('status',PaymentTypeEnum::PAID)->count() == 1)
                        $finishDate->addMonth();
                    break;
                case 300:
                    $finishDate->addMonth();
                    break;
                case 850:
                    $finishDate->addMonths(3);
                    break;
                case 3000:
                    $finishDate->addYear();
                    break;
            }
            $token->finish_date = $finishDate;

            $token->active = TokenTypeEnum::ACTIVE;

            $token->save();

        return redirect()->route('office');
    }

    public function unpaidPayments($id)
    {
        $payment = Payment::query()->find($id);

        $partner = Partners::query()->find($payment->partner_id);

        $token = $partner->currentTocken->first();

        $finishDate = Carbon::parse($token->finish_date);

        $payment->update(['status' => PaymentTypeEnum::PAID]);

        $payment->save();

        if ($payment->status !== PaymentTypeEnum::UNPAID)
            $payment->update(['status' => PaymentTypeEnum::UNPAID]);

        switch ($payment->sum){
            case 0:
                $finishDate->subMonth();
                break;
            case 300:
                $finishDate->subMonth();
                break;
            case 850:
                $finishDate->subMonths(3);
                break;
            case 3000:
                $finishDate->subYear();
                break;
        }
        $token->finish_date = $finishDate;

        $token->save();

        return redirect()->route('office');
    }


}
