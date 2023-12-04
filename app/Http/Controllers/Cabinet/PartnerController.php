<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCompaneRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sail\Console\AddCommand;

class PartnerController extends Controller
{
    public function create(AddCompaneRequest $request)
    {
        $partner = Partners::create($request->validated());

        Auth::user()->partners()->attach($partner);

        Auth::user()->assignRole('user-admin');

        return redirect()->route('page-partner',$partner->id);
    }

    public function show($id)
    {
        $partner = Partners::query()->find($id);

        return view('dashboard.cabinet.partner-cabinet', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, $id)
    {
        $partner = Partners::query()->find($id);

        $partner->update(
            $request->validated()
        );

       return redirect()->back();
    }
}
