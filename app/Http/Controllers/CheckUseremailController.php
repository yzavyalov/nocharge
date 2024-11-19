<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckEmailRequest;
use App\Services\CheckUserEmailService;


class CheckUseremailController extends Controller
{
    public function checkUserEmail(CheckEmailRequest $request)
    {
        $status = CheckUserEmailService::checkUserEmail($request);

        return redirect()->back()->with(['emailStatus' => $status])->withFragment('checkUserEmails');
    }
}
