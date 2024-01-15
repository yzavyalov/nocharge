<?php

namespace App\Http\Middleware;

use App\Models\Partners;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use Symfony\Component\HttpFoundation\Response;

class ActiveTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->hasRole('redaktor'))
            return $next($request);

        $partner_id = session()->get('partner_id');

        $partner = Partners::query()->find($partner_id);

        $token = $partner->currentTocken->first();

        if (empty($token))
        {
            session()->flash('error-activity-token', 'You need to activate the actions of your token! Most likely you need to pay for participation in the system. If you have already paid, then contact the system administrator through your account!');

            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
