<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckUserRequest;
use App\Http\Requests\EmailRequest;
use App\Imports\CheckUsersExcelImport;
use App\Models\CheckUser;
use App\Services\CheckUserService;
use App\Services\EncryptService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;

class CodeController extends Controller
{

    protected CheckUserService $checkUserService;

    public function __construct(CheckUserService $checkUserService)
    {
        $this->checkUserService = $checkUserService;
    }
    public function checkCode(CheckUserRequest $request)
    {
        $request = $request->validated();

        $email = $request['email'];

        $checkMail = EncryptService::coding($email);

        $check = CheckUser::query()->where('email',$checkMail)->first();

        if ($check) {
            session()->flash('success-check', 'This user has been found in our database!');

        } else {
            session()->flash('error-check', 'This user was not found in our database!');
        }
        return redirect()->back();
    }

    public function addCheckUsers(EmailRequest $request)
    {
        if ($request->has('email'))
        {
            $mail = EncryptService::coding($request->email);
            $user = CheckUser::query()->where('email',$mail)->first();

            if (!isset($user))
                CheckUser::create([
                    'email' => $mail,
                    'owner_partner' => session()->get('partner_id'),
                ]);
        }
            //идем по сохранению эмейла в базу
        if ($request->hasFile('file'))
            \Maatwebsite\Excel\Facades\Excel::import(new CheckUsersExcelImport, $request->file('file'));

        session()->flash('success-add-check', 'Your bad guys had added!');

        return redirect()->back();
    }
}
