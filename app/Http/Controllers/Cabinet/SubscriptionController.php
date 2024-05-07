<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::paginate(20);

        return view('cabinet.pages.subscriptions',compact('subscriptions'));
    }

    public function delete($id)
    {
        $suscription = Subscription::query()->find($id);

        $suscription->delete();

        return redirect()->back();
    }
}
