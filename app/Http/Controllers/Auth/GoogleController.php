<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    /**
     * Redirect user to Google login page
     */
    public function redirect()
    {
        return Socialite::driver('google')
            ->setHttpClient(new Client([
                'verify' => false, // LOCAL ONLY (Windows SSL issue)
            ]))
            ->stateless()
            ->redirect();
    }

    /**
     * Handle Google callback
     */
    public function callback()
    {
        $googleUser = Socialite::driver('google')
            ->setHttpClient(new Client([
                'verify' => false, // SAME FIX HERE
            ]))
            ->stateless()
            ->user();

        // Try to find user by email
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // New user (never registered before)
            $user = User::create([
                'name'      => $googleUser->getName() ?? 'Google User',
                'email'     => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password'  => bcrypt(uniqid()), // dummy password
            ]);
        } else {
            // Existing user (email/password user)
            if (empty($user->google_id)) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }
        }

        // Login the user
        Auth::login($user);

        return redirect()->intended('/dashboard');
    }
}
