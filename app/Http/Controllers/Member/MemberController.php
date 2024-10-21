<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
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
        $user = User::find($user_id);

        $user->organization_id = $organization->id;
        $user->status = "pending";
        $user->save();

        $organizations = Organization::simplePaginate(5);

        session()->forget("hide-organization");

        return redirect()->route("dashboard.index");
    }

    function hide(Organization $organization) {
        $id = $organization->id;

        if (session()->has('hide-organization')) {
            $session = session()->get('hide-organization');

            // Check if the organization ID is not already in the array
            if (!in_array($id, $session)) {
                $session[] = $id;
                session()->put('hide-organization', $session);
            }
        } else {
            session()->put('hide-organization', [$id]);
        }

        return redirect()->route("organizations.listings");
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
