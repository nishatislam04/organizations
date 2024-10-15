<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\member\member;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Organization $organization) {
        if (!Auth::check()) {
            $organizationId = $organization->id;
            session()->put("joining_org", $organizationId);

            return redirect()->route("auth.login");
        }
        $user_id = Auth::id();

        Member::create([
            "user_id" => $user_id,
            "organization_id" => $organization->id
        ]);

        $user = User::find($user_id);
        $user->organization_id = $organization->id;
        $user->save();

        return redirect()->route("organizations.index");
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
