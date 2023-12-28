<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\PaymentTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Payment;
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
}
