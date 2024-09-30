<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    function loginView() {
        return view("auth.login");
    }

    function registerView() {
        return view("auth.register");
    }

    /**
     * login a user
     *
     */
    function login(Request $request) {
        $validated = $request->validate(
            [
                "username" => "required|string|min:3|max:254",
                "password" => "required|min:3|max:254"
            ]
        );

        if (Auth::attempt([
            "username" => $validated['username'],
            "password" => $validated["password"]
        ])) {
            $request->session()->regenerate();

            return redirect()->route("dashboard.index");
        }

        return redirect()->route("login")->withErrors(
            ["username" => "The provided credentials do not match our records."]
        );
    }

    /**
     * register a user
     * 
     */
    function register(Request $request) {
        $validated = $request->validate(
            [
                'username' => "required|string|min:3|max:254",
                "email" => "required|email|min:5|max:254",
                "role" => "required|string|in:admin,member",
                "password" => "required|confirmed|min:3|max:254"
            ]
        );


        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route("dashboard.index");
    }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
