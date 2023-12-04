<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangeRequest;
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
        $user = $request->user();

        $this->checkUserService->create($request->all(), $user);

        return response()->json(['message' => 'Пользователи успешно сохранены'], 200);
    }

    public function ckeckGroupUser(UserChangeRequest $request)
    {
        return $this->checkUserService->checkGroupUsers($request);
    }

    public function checkOneUser(UserChangeRequest $request)
    {
        $check = $this->checkUserService->checkGroupUsers($request);

        if (!empty($check['coincidence']))
            return response()->json(['message' => 'This user is in our base'],201);

        if (!empty($check['mismatch']))
            return response()->json(['message' => 'This user is not in our base'],203);
    }
}
