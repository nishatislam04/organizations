<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $organizations = Organization::with("user")->with("joinedMembers")->get();

        return view("organizations.index", compact("organizations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        return view("organizations.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            "name" => "required|string|min:3,max:254",
            "description" => "required|string",
            "max_members" => "required|integer|min_digits:1"
        ]);
        $validated["user_id"] = Auth::id();

        Organization::create($validated);

        return redirect()->route("organizations.index")->with("sucess", "organization create success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization) {
        return view("organizations.show", compact("organization"));
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
