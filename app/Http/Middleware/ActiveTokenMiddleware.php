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
        // Проверяем, если у пользователя роль 'redaktor', пропускаем
        if (Auth::user()->hasRole('redaktor')) {
            return $next($request);
        }

        $partner_id = session()->get('partner_id');

        // Проверка наличия партнерского ID
        if (empty($partner_id)) {
            session()->flash('error', 'Partner ID not found in session.');
            return redirect()->route('dashboard');
        }

        // Пытаемся найти партнера
        $partner = Partners::query()->find($partner_id);

        // Если партнер не найден, перенаправляем с ошибкой
        if (empty($partner)) {
            session()->flash('error', 'Partner not found. Please check your account.');
            return redirect()->route('dashboard');
        }

        // Получаем активный токен
        $token = $partner->currentTocken->first();

        // Если активных токенов нет, показываем сообщение об ошибке
        if (empty($token)) {
            session()->flash('error-activity-token', 'You need to activate the actions of your token! Most likely you need to pay for participation in the system. If you have already paid, then contact the system administrator through your account!');
            return redirect()->route('dashboard');
        }

        return $next($request);
    }

}
