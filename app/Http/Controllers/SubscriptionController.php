<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Organization $organization) {
        $subscriptions = Subscription::where("organization_id", $organization->id)
            ->get();

        // dd($subscriptions);

        return view("subscriptions.index", compact("organization", "subscriptions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Organization $organization) {
        return view("subscriptions.create", compact("organization"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Organization $organization) {

        $validated = $request->validate([
            "type" => "required|string",
            "total" => "required|integer",
            "per_amount" => "required|integer",
            "penalty_amount" => "required|integer",
            "start" => "required|string"
        ]);

        $validated["organization_id"] = $organization->id;

        Subscription::create($validated);

        return redirect()->route("organizations.show", $organization->id)->with("success", "subscription create success");
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
