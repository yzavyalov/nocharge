<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\EmployeeApplicationStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Models\Claim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function emailForm(EmailRequest $request)
    {
        $request = $request->validated();

        $email = $request['email'];

        $admin = User::query()->where('email',$email)->first();

        if ($admin)
        {
            if ($admin->partners->count() > 0)
            {
                $message = 'We found the email of the company administrator';

                $status = 1;
            }
            else
            {
                $message = 'This email is not a company administrator';

                $status = 2;
            }
        }
        else
        {
            $message = 'There is not such email in our database, please check it and try again';

            $status = 3;
        }
        return view('cabinet.employee.confirmation',compact('email','message','status'));
    }

    public function claim(Request $request)
    {
        $admin = User::query()->where('email',$request->email)->first();

        $user = Auth::user();

        if ($admin)
        {
            $claim = Claim::query()->where('user_id',Auth::id())->where('admin_id',$admin->id)->first();

            if (isset($claim))
            {
                if ($claim->count() > 0)
                {
                    $message = 'You already have a request with these parameters!';
                }
                elseif($claim->count() == 0)
                {
                    $claim = Claim::create([
                        'user_id' => Auth::id(),
                        'admin_id' => $admin->id,
                        'status' => EmployeeApplicationStatusEnum::CREATED,
                        'partner_id' => $admin->partners->first()->id,
                    ]);

                    $message = 'Request has been sent!';
                }
            }
            else
            {
                $claim = Claim::create([
                    'user_id' => Auth::id(),
                    'admin_id' => $admin->id,
                    'status' => EmployeeApplicationStatusEnum::CREATED,
                    'partner_id' => $admin->partners->first()->id,
                ]);

                $message = 'Request has been sent!';
            }
            $user->assignRole('user-employee');

            $user->removeRole('user-testing');
        }
        else
        {
            $message = 'We didn\'t find this email in our base';
        }


        return view('cabinet.employee.employ-cabinet', compact( 'message','user'));
    }
}
