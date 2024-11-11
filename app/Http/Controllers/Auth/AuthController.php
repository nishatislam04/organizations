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

        session()->has("joining_org") ?
            $organizations = [] :
            $organizations = Organization::all();

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
        $remember = $request->remember ? true : false;

        $user = User::where("email", $validated['username'])
            ->orWhere("username", $validated['username'])->first();

        if (!$user) {
            return redirect()->route("login")
                ->withErrors(
                    ["username" => "The provided credentials do not match our records."]
                );
        }

        if (
            Auth::attempt(['email' => $user->email, 'password' => $validated['password']], $remember) ||
            Auth::attempt(['username' => $user->username, 'password' => $validated['password']], $remember)
        ) {
            $request->session()->regenerate();

            $user->organization_id = $user->organization_id ?? session()->get("joining_org");
            $user->status = $user->status ?? "pending";
            $user->save();

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
                'username' => "required|string|min:3|max:254|unique:users,username",
                "email" => "required|email|min:5|max:254",
                "organization_id" => "nullable|integer",
                "avatar" => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:1024',
                "password" => "required|confirmed|min:3|max:254"
            ]
        );
        $remember = $request->remember ? true : false;

        $validated['role'] = "member";
        $validated["status"] = "pending";
        $validated['organization_id'] = session()->get("joining_org") ?? $validated['organization_id'];

        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarName = time() . '_' . $avatarFile->getClientOriginalName();
            $avatarFile->storeAs('uploads', $avatarName, 'public');
            $validated['avatar'] = $avatarName;
        }
        $user = User::create($validated);

        Auth::login($user, $remember);

        session()->forget("joining_org");

        return redirect()->route("dashboard.index");
    }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->forget("joining_org");

        return redirect('');
    }
}
