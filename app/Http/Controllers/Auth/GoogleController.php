<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\User as AuthUser;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller {
    /**
     * Redirect the user to Google's OAuth page.
     */
    public function redirectToGoogle() {
        return
            Socialite::driver('google')
            ->with(['prompt' => 'select_account', 'access_type' => 'offline'])
            ->redirect(); // Redirect to Google's OAuth page
    }

    /**
     * Handle the callback from Google after the user logs in.
     */
    public function handleGoogleCallback() {
        try {
            // Get the user information from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user with the given email already exists
            $user = AuthUser::where('email', $googleUser->getEmail())->first();

            if ($user) {

                if (is_null($user->google_id)) {
                    $user->google_id = $googleUser->getId();
                    $user->organization_id = session()->get("joining_org");
                    $user->status = "pending";
                    $user->save();
                } else {
                    $user->organization_id = $user->organization_id ?? session()->get("joining_org");
                    $user->status =  $user->status === "passed" ? "passed" : "pending";
                    $user->save();
                }
            } else {

                $user = AuthUser::create([
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('1234'),
                    "status" => "pending",
                    "organization_id" => session()->get("joining_org"),
                    "avatar" => $googleUser->getAvatar()
                ]);
            }

            Auth::login($user);

            return redirect()->route('dashboard.index');
        } catch (Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Unable to login, try again.']);
        }
    }
}
