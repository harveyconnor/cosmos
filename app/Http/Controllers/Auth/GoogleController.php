<?php

namespace App\Http\Controllers\Auth;

use App\Google;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $googleClient = Socialite::driver('google')->user();

        $checkGoogle = Google::query()->where('google_id',$googleClient->id)->first();

        if($checkGoogle) {
            Auth::loginUsingId($checkGoogle->user_id);
            return redirect()->route('dashboard');
        } else
        {
            $password = md5(str_random(16));

            $user = new User();
            $user->name = $googleClient->user['name']['givenName'] . ' ' . $googleClient->user['name']['familyName'];
            $user->email = $googleClient->email;
            $user->password = bcrypt($password);
            $user->save();

            $google = new Google();
            $google->google_id = $googleClient->id;
            $google->nickname = $googleClient->nickname;
            $google->avatar = $googleClient->avatar_original;
            $google->refresh_token = $googleClient->refreshToken;
            $google->user_id = $user->id;
            $google->save();

            Auth::loginUsingId($user->id);
            return redirect()->route('dashboard');
        }
    }
}
