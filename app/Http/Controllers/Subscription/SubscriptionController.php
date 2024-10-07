<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Installment\Installment;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
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
            "type" => "required|in:monthly,yearly",
            "total" => "required|integer",
            "per_amount" => "required|integer",
            "penalty_amount" => "required|integer",
            "start" => "required|regex:/\d{2}:\d{4}/"
        ]);

        $validated["organization_id"] = $organization->id;

        $subs =  Subscription::create($validated);

        $organization_id = $organization->id;
        $subscription_id = $subs->id;
        $pay_amount = $validated['per_amount'];
        $start_date = $validated['start'];
        $total = $validated["total"];

        $this->createInstallment([
            'organization_id' => $organization_id,
            'subscription_id' => $subscription_id,
            'pay_amount' => $pay_amount,
            'start_date' => $start_date,
            'total' => $total
        ]);

        return redirect()->route("organizations.show", $organization->id)->with("success", "subscription create success");
    }

    function createInstallment($data) {
        $all_installments = [];

        list($month, $year) = explode(":", $data['start_date']);


        for ($i = 0; $i < $data['total']; $i++) {
            if ((int) $month === 13) {
                $month = 1;
                $year++;
            }

            $due_date = (int) $month . ":" . (int) $year;
            $all_installments[] = [
                'organization_id' => $data['organization_id'],
                "subscription_id" => $data['subscription_id'],
                "pay_amount" => $data['pay_amount'],
                "due_date" => $due_date,
                "created_at" => date("d-m-Y")
            ];

            $month++;
        }

        Installment::insert($all_installments);
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
