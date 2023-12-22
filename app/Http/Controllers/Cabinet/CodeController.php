<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Models\CheckUser;
use App\Services\CheckUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeController extends Controller
{

    protected CheckUserService $checkUserService;

    public function __construct(CheckUserService $checkUserService)
    {
        $this->checkUserService = $checkUserService;
    }
    public function checkCode(Request $request)
    {
        dd('feferg');
    }

    public function addCode(EmailRequest $request)
    {
        $userData = $request->validated();

        $this->checkUserService->create($userData,Auth::user());

    }
}
