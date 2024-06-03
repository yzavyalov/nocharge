<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Socialite\CheckUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SocialiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
//        if ($provider == 'linkedin')
//        {
//           $this->linkedin($provider);
//        }

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

       //сделать проверку юзера и если оно есть то обновлять те данные которые пустые
            $user = User::updateOrCreate([
                'email' => $socialUser->email,
            ], [
                'provider_id' => $socialUser->id,
                'provider' => $provider,
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'provider_token' => $socialUser->token,
            ]);

            Auth::login($user);

        return redirect('/dashboard');
    }

    protected function linkedin($provider)
    {
        $token = env('LINKED_TOKEN');

        $response = Http::withToken($token)->get('https://api.linkedin.com/v2/userinfo');

        if ($response->successful()) {

            $socialUser = $response->json();

            $user = User::updateOrCreate([
                'email' => $socialUser['email'],
            ], [
                'provider_id' => $socialUser['sub'],
                'provider' => $provider,
                'name' => $socialUser['name'],
                'email' => $socialUser['email'],

            ]);
            // Если запрос был успешным, можно выполнить перенаправление
            return redirect('/dashboard');
        } else {
            // Обработка ошибки, если запрос не удался
            // Например, можно выполнить какие-то действия или показать пользователю сообщение об ошибке
            return back()->with('error', 'Failed to fetch data from API');
        }
    }
}
