<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')
            ->setHttpClient(new Client(['verify' => false])) // LOCAL ONLY
            ->stateless()
            ->redirect();
    }

    public function callback()
    {
        $facebookUser = Socialite::driver('facebook')
            ->setHttpClient(new Client(['verify' => false])) // LOCAL ONLY
            ->stateless()
            ->user();

        $user = User::where('email', $facebookUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name'        => $facebookUser->getName() ?? 'Facebook User',
                'email'       => $facebookUser->getEmail(),
                'facebook_id' => $facebookUser->getId(),
                'password'    => bcrypt(uniqid()),
            ]);
        } else {
            if (empty($user->facebook_id)) {
                $user->update([
                    'facebook_id' => $facebookUser->getId(),
                ]);
            }
        }

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }
}
