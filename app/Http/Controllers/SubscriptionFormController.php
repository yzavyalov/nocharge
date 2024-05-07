<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionFormController extends Controller
{
    public function subscriptionForm(SubscriptionRequest $request)
    {
        Subscription::create($request->validated());

        return redirect()->back();
    }
}
