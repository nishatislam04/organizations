<?php

namespace App\Http\Controllers\Installment;

use App\Http\Controllers\Controller;
use App\Models\Installment\Installment;
use App\Models\Subscription\Subscription;
use Illuminate\Http\Request;

class InstallmentController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Subscription $subscription) {

        $dueDates =  $subscription->installments;
        // $dueDates =  $subscription->installments->simplePaginate(5);

        $details =  Installment::where("subscription_id", $subscription->id)
            ->join("subscriptions", "installments.subscription_id", "=", "subscriptions.id")
            ->join("organizations", "installments.organization_id", "=", "organizations.id")
            ->select(
                "subscriptions.name as subscriptionName",
                "subscriptions.type as subscriptionType",
                "subscriptions.penalty_amount as installmentPenaltyAmount",
                "subscriptions.per_amount as installmentPerAmount",
                "organizations.name as organizationName"
            )
            ->first();

        // dd($details);

        // $installments = Installment::where("subscription_id", $subscription->id)
        //     ->join("subscriptions", "installments.subscription_id", "=", "subscriptions.id")
        //     ->join("organizations", "installments.organization_id", "=", "organizations.id")
        //     ->select(
        //         "installments.id as installmentId",
        //         "installments.due_date as installmentDueDate",
        //         "installments.created_at as installmentCreatedAt",
        //         "subscriptions.id as subscriptionId",
        //         "subscriptions.name as subscriptionName",
        //         "subscriptions.type as subscriptionType",
        //         "subscriptions.total as subscriptionTotal",
        //         "subscriptions.total as subscriptionTotal",
        //         "subscriptions.per_amount as subscriptionPerAmount",
        //         "subscriptions.start as subscriptionStart",
        //         "organizations.name as organizationName"
        //     )
        //     ->get();

        return view("installment.index", compact("dueDates", "details"));
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
        //
    }
}
