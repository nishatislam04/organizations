<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $superRoleId = User::where("role", "=", "super")->get();
        $superRoleId = $superRoleId[0]->id;

        $organizations = Organization::where("user_id", $superRoleId)->get();
        return view("users.create", compact("organizations"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            "username" => "required|min:3|max:254",
            "email" => "required|email",
            "password" => "required",
            "organization_id" => "required",
        ]);
        $validated['role'] = "admin";

        // create a new user
        $user = User::create($validated);

        // update the existing user_id on organization table
        $organization = Organization::findOrFail($validated['organization_id']);
        $organization->user_id = $user->id;
        $organization->save();

        return redirect()->route("users.index")->with("success", "user create & assign success");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
