<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Cabinet\LudomanController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangeRequest;
use App\Http\Resources\CheckUserResource;
use App\Http\Resources\MismatchChangeUserResource;
use App\Models\CheckUser;
use App\Models\Quantity_user_request;
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

        foreach ($check['coincidence'] as $coincidence)
        {
            $ludoman = new LudomanController();
            $ludoUser = $ludoman->checkInBase($coincidence['email']);
            if ($ludoUser)
            {
                $coincidence['ludoman'] = 1;
                $coincidence['limit'] = $ludoUser->limit;
            }
            else
            {
                $coincidence['ludoman'] = 0;
            }

            $coincidence['chargeback_initiator'] = 1;
        }
        unset($coincidence); // Удалить ссылку, чтобы избежать случайных изменений

        foreach ($check['mismatch'] as $mismatch)
        {
            $ludoman = new LudomanController();
            $ludoUser = $ludoman->checkInBase($mismatch['email']);
            if ($ludoUser)
            {
                $mismatch['ludoman'] = 1;
                $mismatch['limit'] = $ludoUser->limit;
            }
            else
            {
                $mismatch['ludoman'] = 0;
            }

            $mismatch['chargeback_initiator'] = 0;
        }
        unset($mismatch); // Удалить ссылку, чтобы избежать случайных изменений

        $answer['coincidence'] = CheckUserResource::collection($check['coincidence']);
        $answer['mismatch'] = MismatchChangeUserResource::collection($check['mismatch']);

        return $answer;
    }

}
