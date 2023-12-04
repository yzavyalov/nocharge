<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Models\User;
use Illuminate\Http\Request;

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

                $message = 'We found the email of the company administrator:'.$admin->partners->first()->name;

            else

                $message = 'This email is not a company administrator';
        }
        else
        {
            $message = 'There is no such email in our database, please check it and try again';
        }
        return view('cabinet.employee.email-dashboard',compact('email','message'));
    }
}
