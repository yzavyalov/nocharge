<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\EmployeeApplicationStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\User;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function claimSuccsess(Request $request, $id)
    {
        $claim = Claim::query()->find($id);

        if ($request->status == 1 || $request->status == 3)
        {
            $claim->update([
                'status' => EmployeeApplicationStatusEnum::AGREED,
                'partner_id' => $request->company,
            ]);
        }
        else
        {
            $claim->update([
                'status' => EmployeeApplicationStatusEnum::CANCELED,
                'partner_id' => $request->company,
            ]);
        }

        $user = $claim->owner;

        if ($user->partners->where('id',$request->company)->count() == 0)
            $user->partners()->attach($request->company);

        return redirect()->back();
    }

    public function claimDel($id)
    {
        $claim = Claim::query()->find($id);

        $user = $claim->owner;

        $user->partners->detach();

        $user->assignRole('user-testing');

        $user->removeRole('user-employee');

        $claim->delete();

        return redirect()->back();
    }
}
