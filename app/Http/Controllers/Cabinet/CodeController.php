<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\QuantityCheckUsersTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckUserRequest;
use App\Http\Requests\EmailRequest;
use App\Imports\CheckUsersExcelImport;
use App\Models\CheckUser;
use App\Models\Quantity_user_request;
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

        $ludoman = new LudomanController();

        $ludoUser = $ludoman->checkInBase($checkMail);

        if (Auth::user()->hasRole('redaktor'))
            $ownerPartner = 1;
        else
            $ownerPartner = session()->get('partner_id');

        if ($check)
        {
            if ($ludoUser)
                session()->flash('success-check', 'This user has been identified in our database as a chargeback initiator and a gambler (his limit - '.$ludoUser->limit.').');
            else
                session()->flash('success-check', 'This user has been identified in our database as a chargeback initiator.');

            Quantity_user_request::create([
                'user_id' => Auth::id(),
                'partner_id' => $ownerPartner,
                'check_user_id' => $check->id,
                'type' => QuantityCheckUsersTypeEnum::CHECKED,
            ]);

        }
        else
        {
            if ($ludoUser)
                session()->flash('error-check', 'This user is recorded in our database as a gambler (his limit - '.$ludoUser->limit.'), but was not identified as a chargeback initiator.');
            else
                session()->flash('error-check', 'This user is not in our database!');
        }
        return redirect()->back()->with(['anchor' => 'checkUser']);
    }



    public function addCheckUsers(EmailRequest $request)
    {
        try {
            if ($request->has('email')) {
                $mail = EncryptService::coding(EncryptService::preparationEmail($request->email));
                $user = CheckUser::query()->where('email', $mail)->first();
                $ownerPartner = Auth::user()->hasRole('redaktor') ? 1 : session()->get('partner_id');

                if (!$user) {
                    CheckUser::create([
                        'email' => $mail,
                        'owner_partner' => $ownerPartner,
                    ]);
                }
            }

            if ($request->hasFile('file')) {
                \Maatwebsite\Excel\Facades\Excel::import(new CheckUsersExcelImport, $request->file('file'));
                session()->flash('success-add-check', 'Your bad guys have been added successfully!');
            } else {
                throw new \Exception('File not found in the request.');
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            $errorMessages = [];
            foreach ($failures as $failure) {
                $errorMessages[] = 'Row ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            session()->flash('error-add-check', 'There were errors in the file: ' . implode('; ', $errorMessages));
        } catch (\Exception $e) {
            session()->flash('error-add-check', 'An error occurred while processing the file: ' . $e->getMessage());
        }

        return redirect()->back()->with(['anchor' => 'checkUserBlock']);
    }

}
