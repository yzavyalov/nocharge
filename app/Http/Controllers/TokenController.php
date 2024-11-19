<?php

namespace App\Http\Controllers;

use App\Enums\TokenTypeEnum;
use App\Http\Requests\ExtendPeriodFormRequest;
use App\Models\CostService;
use App\Models\Partners;
use App\Models\Token;
use App\Services\BalanceService;
use App\Services\CostServicesService;
use App\Services\TokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{

    public function __construct(BalanceService $balanceService, CostServicesService $costServicesService)
    {
        $this->balanceService = $balanceService;

        $this->costServicesService = $costServicesService;
    }
    public function create($partner_id)
    {
        $token = TokenService::createToken($partner_id);

        Token::create([
            'partner_id' => $partner_id,
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

    public function tokenExtend(ExtendPeriodFormRequest $request, $tokenId)
    {
        $period = $request->validated();

        $period = $period['period'];

        $token = Token::query()->find($tokenId);

        $partner = $token->partner;

        $IdCostService = $this->costServicesService->selectIdTokenPeriodPrice($period);

        $costService = CostService::query()->find($IdCostService);

        if ($this->balanceService->checkBalance($partner, $costService->price_usdt))
        {
            $this->balanceService->minusBalance($partner->id,$costService->price_usdt);

            TokenService::tokenExtendAndActive($token, $period);

            return redirect()->back();
        }
        else
        {
            return redirect()->back()->with('error','You don\'t have enough money!');
        }

    }
}
