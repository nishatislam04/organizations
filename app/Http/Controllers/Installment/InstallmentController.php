<?php

namespace App\Http\Controllers\Installment;

use App\Http\Controllers\Controller;
use App\Models\Installment\Installment;
use App\Models\Installment\Installment_collections;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstallmentController extends Controller {
    /**
     * Display a listing of the resource. 
     */
    public function index(Subscription $subscription) {

        $dueDates =  $subscription->installments;

        $details =  Installment::where("subscription_id", $subscription->id)
            ->join("subscriptions", "installments.subscription_id", "=", "subscriptions.id")
            ->join("organizations", "installments.organization_id", "=", "organizations.id")
            ->select(
                "installments.id as installmentId",
                "organizations.id as organizationId",
                "subscriptions.id as subscriptionId",
                "subscriptions.name as subscriptionName",
                "subscriptions.type as subscriptionType",
                "subscriptions.penalty_amount as installmentPenaltyAmount",
                "subscriptions.per_amount as installmentPerAmount",
                "organizations.name as organizationName"
            )
            ->first();

        // dd($details);

        return view("installment.index", compact("dueDates", "details"));
    }

    function payView(Subscription $subscription) {
        $details =  Installment::where("subscription_id", $subscription->id)
            ->join("subscriptions", "installments.subscription_id", "=", "subscriptions.id")
            ->join("organizations", "installments.organization_id", "=", "organizations.id")
            ->select(
                "installments.id as installmentId",
                "organizations.id as organizationId",
                "subscriptions.id as subscriptionId",
                "subscriptions.name as subscriptionName",
                "subscriptions.type as subscriptionType",
                "subscriptions.penalty_amount as installmentPenaltyAmount",
                "subscriptions.per_amount as installmentPerAmount",
                "organizations.name as organizationName"
            )
            ->first();
        return view("installment.pay", compact("details"));
    }

    function pay(int $organizationId, int $subscriptionId, int $installmentId) {
        Installment_collections::create([
            'user_id' => Auth::id(),
            "organization_id" => $organizationId,
            "subscription_id" => $subscriptionId,
            "installment_id" => $installmentId,
        ]);

        return redirect()->route("dashboard.index");
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
    public function store(Request $request) {
        //
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
        // date()
    }
}
