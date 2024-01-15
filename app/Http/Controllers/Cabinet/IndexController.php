<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\PartnersTypeEnum;
use App\Enums\PaymentTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Badbook\BadItem;
use App\Models\Badbook\ItemComments;
use App\Models\CheckUser;
use App\Models\Partners;
use App\Models\Payment;
use App\Models\Quantity_user_request;
use App\Models\User;
use App\Services\TokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = User::query()->find(Auth::id());

        TokenService::checkPeriodStatusToken($user);

        if ($user->hasRole('redaktor'))
        {
            $checkuserCount = CheckUser::all()->count();

            $checkCount = Quantity_user_request::all()->count();

            $negativeReviewCount = BadItem::all()->count();

            $commentCount = ItemComments::all()->count();

            $payments = Payment::paginate(20);

            $paymentTypes = PaymentTypeEnum::toSelectArray();

            $partners = Partners::paginate(20);

            $partnerTypes = PartnersTypeEnum::toSelectArray();

            return view('cabinet.my.my-cabinet',compact('user','partners','checkuserCount','checkCount','negativeReviewCount','commentCount','payments','paymentTypes','partnerTypes'));
        }
        elseif ($user->hasRole('user-admin'))
        {
            return view('cabinet.admin.partner-cabinet',compact('user'));
        }
        elseif ($user->hasRole('user-employee'))
        {
            session([
                'partner_id' => $user->activeClaim->first()->partner_id,
            ]);

            return view('cabinet.employee.employee-cabinet',compact('user'));
        }
        else
        {
            return view('dashboard');
        }
    }

    public function cabinetIndex()
    {
        return view('cabinet.my.my-cabinet');
    }

    public function companyForm()
    {
        return view('dashboard.companyForm');
    }

    public function packetPage()
    {
        return view('packets');
    }

}
