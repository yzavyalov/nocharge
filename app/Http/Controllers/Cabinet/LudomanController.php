<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\LudomanFormRequest;
use App\Models\CheckUser;
use App\Models\Ludoman;
use App\Services\EncryptService;
use Illuminate\Http\Request;

class LudomanController extends Controller
{
    public function create(LudomanFormRequest $request)
    {
        $validated = $request->validated();

        $email = $validated['email'];

        $checkMail = EncryptService::coding($email);

        $validated['email'] = $checkMail;

        $validated['limit'] = $validated['limit'] ?? 0;

        if (!$this->checkInBase($validated['email']))
            Ludoman::create($validated);

        return redirect()->back()->with('message','We have entered your data into the database, but now this is in a test version for free. After the system starts working normally, we will notify you of the need to re-enter the database!');
    }

    public function checkInBase($email)
    {
        $ludoman = Ludoman::query()->where('email',$email)->first();

        return $ludoman ? $ludoman : null;
    }

}
