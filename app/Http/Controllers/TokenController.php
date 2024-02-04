<?php

namespace App\Http\Controllers;

use App\Enums\TokenTypeEnum;
use App\Models\Partners;
use App\Models\Token;
use App\Services\TokenService;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function create($company_id)
    {
        $token = TokenService::createToken($company_id);

        Token::create([
            'partner_id' => $company_id,
            'token' => $token,
            'active' => TokenTypeEnum::ACTIVE,
            'finish_date' => date('Y-m-d', strtotime('+5 days')),
        ]);

        return $token;
    }

    public function update($id)
    {
        $oldtoken = Token::query()->find($id);

        $token = TokenService::createToken($oldtoken->partner_id);

        $oldtoken->update([
            'token' => $token,
        ]);

        return redirect()->back();
    }
}
