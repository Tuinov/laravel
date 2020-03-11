<?php


namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Hash;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;


class UserRepository
{
    public function getUserBySocial(UserOAuth $userOAuth)
    {
        $user = new User();
        $user->fill([
            'name' => $userOAuth->name,
            'email' => $userOAuth->accessTokenResponseBody['email'],
            'password' => Hash::make($userOAuth->id),
            'avatar' => $userOAuth->avatar,
        ])->save();

        return $user;
    }
}