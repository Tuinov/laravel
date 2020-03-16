<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;

class LoginController extends Controller
{
    public function loginVK()
    {
        if(Auth::check()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository)
    {

        $userOAuth = Socialite::driver('vkontakte')->user();
        // проверяет наличие в базе этого пользователя по емаил
        $user = User::query()
            ->where('email','=', $userOAuth->accessTokenResponseBody['email'])
        ->first();

        if(empty($user)) {
            $user = $userRepository->getUserBySocial($userOAuth);
        }

        Auth::login($user);
        return redirect()->route('home');
    }
}
