<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Cabinet\LudomanController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangeRequest;
use App\Http\Resources\CheckUserResource;
use App\Services\CheckUserService;
use App\Services\EncryptService;

class CheckUserController extends Controller
{
    protected CheckUserService $checkUserService;

    public function __construct(CheckUserService $checkUserService)
    {
        $this->checkUserService = $checkUserService;
    }

    public function uploadUser(UserChangeRequest $request)
    {
        $partnerId = session()->get('partner_id');

        $this->checkUserService->create($request->all(), $partnerId);

        return response()->json(['message' => 'Users successfully saved'], 200);
    }

    public function checkUser(UserChangeRequest $request)
    {
        $check = $this->checkUserService->checkGroupUsers($request);

        $checkUsers = [];

        $i = 0;

        foreach ($check as $checkUser)
        {
            $ludoman = new LudomanController();
            $ludoUser = $ludoman->checkInBase(EncryptService::coding($checkUser['email']));
            if ($ludoUser)
            {
                $checkUser['ludoman'] = 1;
                $checkUser['limit'] = $ludoUser->limit;
            }
            else
            {
                $checkUser['ludoman'] = 0;
            }
            $checkUsers[$i] = $checkUser;

            $i++;
        }

        $answer = CheckUserResource::collection($checkUsers);

        return $answer;
    }

}
