<?php

namespace SLJ\SLJLaravelClient\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('slj')->redirect();
    }

    public function callback()
    {
        /** @var \SocialiteProviders\Manager\OAuth2\User $user */
        $authUser = Socialite::driver('slj')->user();
        // Let's create a new entry in our users table (or update if it already exists) with some information from the user
        $user = app(\SLJ\SLJLaravelClient\Model\User::class)->updateOrCreate([
            'slj_id' => $authUser->id,
        ], [
            'name' => $authUser->name,
            'email' => $authUser->email,
            'slj_access_token' => $authUser->token,
            'slj_refresh_token' => $authUser->refreshToken,
        ]);

        // Logging the user in
        Auth::login($user);
        dd(Auth::user());
        // Here, you should redirect to your app's authenticated pages (e.g. the user dashboard)
        return redirect('/');
    }
}
