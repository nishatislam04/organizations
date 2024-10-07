<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    function loginView() {
        return view("auth.login");
    }

    function registerView() {
        $superRoleId = User::where("role", "=", "super")->get();
        $superRoleId = $superRoleId[0]->id;

        $organizations = Organization::where("user_id", $superRoleId)->get();
        return view("auth.register", compact("organizations"));
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
        $remember = $request->has("remember");

        $user = User::where("email", $validated['username'])
            ->orWhere("username", $validated['username'])->first();

        if (!$user) {
            return redirect()->route("login")
                ->withErrors(
                    ["username" => "The provided credentials do not match our records."]
                );
        }

        if (
            Auth::attempt(['email' => $user->email, 'password' => $validated['password']]) ||
            Auth::attempt(['username' => $user->username, 'password' => $validated['password']], $remember)
        ) {
            $request->session()->regenerate();

            return redirect()->route("dashboard.index");
        }

        return redirect()->route("login")
            ->withErrors(
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
                // "role" => "required|string|in:admin,member",
                "organization_id" => "required",
                "password" => "required|confirmed|min:3|max:254"
            ]
        );
        $validated['role'] = "admin";
        $validated["status"] = "pending";
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
