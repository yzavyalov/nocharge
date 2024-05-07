<?php

namespace App\Http\Middleware;

use App\Enums\TokenTypeEnum;
use App\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (empty($token) || !str_starts_with($token, 'Bearer ')) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $token = str_replace('Bearer ', '', $token);

        $checkToken = Token::query()->where('token',$token)->first();

        if ($checkToken && $checkToken->active == TokenTypeEnum::ACTIVE)
        {
            session(['partner_id' => $checkToken->partner_id]);

            return $next($request);
        }
        else
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
