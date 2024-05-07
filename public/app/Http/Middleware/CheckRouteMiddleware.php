<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userPartners = Auth::user()->partners;

        $user_partner_id = session()->get('partner_id');

        $routeId = $request->route()->id;

        if ($user_partner_id == $routeId || $userPartners->contains($routeId))
            return $next($request);
        else
            return redirect()->route('dashboard');
    }
}
