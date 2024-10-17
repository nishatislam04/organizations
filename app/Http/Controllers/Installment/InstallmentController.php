<?php

namespace App\Http\Controllers\Installment;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Installment\Installment;
use App\Models\Installment\InstallmentCollections;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstallmentController extends Controller {
    /**
     * Display a listing of the resource. 
     */
    public function index(Subscription $subscription) {

        $installments = Installment::where("subscription_id", $subscription->id)
            ->with("collected")->get();
        $details =  Installment::where("subscription_id", $subscription->id)
            ->join("subscriptions", "installments.subscription_id", "=", "subscriptions.id")
            ->join("organizations", "installments.organization_id", "=", "organizations.id")
            ->select(
                "organizations.id as organizationId",
                "subscriptions.id as subscriptionId",
                "subscriptions.name as subscriptionName",
                "subscriptions.type as subscriptionType",
                "subscriptions.penalty_amount as installmentPenaltyAmount",
                "subscriptions.per_amount as installmentPerAmount",
                "organizations.name as organizationName"
            )
            ->first();

        // penalty calculation
        $today = CarbonImmutable::now();
        $tomorrow = $today->addDays();
        $yestarday = $today->subDays();
        list($currMonth, $currYear) = [date("n"), date("Y")];
        $user = User::find(Auth::id());

        foreach ($installments as $installment) {
            $dueDate = Carbon::createFromFormat("d-m-Y", $installment->due_date);
            // if yestarday is same day as due date, we perform penalty calculation
            if ($yestarday->isSameDay($dueDate)) {
                if (is_null($user->last_penalty_date)) {
                    // check if user paid
                    $isPayed = InstallmentCollections::where("installment_id", $installment->id)->first();
                    if (is_null($isPayed)) {
                        // charge & update last change date
                        $user->increment("penalty_charges", $subscription->penalty_amount);
                        $user->last_penalty_date = date("d-m-Y");
                        $user->save();
                    } else {
                        // user already paid
                        return view("installment.index", compact("installments", "details"));
                    }
                } else {
                    // check 'last_penalty_date' is current due_date
                    $user_last_penalty_date = Carbon::createFromFormat("d-m-Y", $user->last_penalty_date);

                    if ($user_last_penalty_date->isSameDay($dueDate)) {
                        // user already penalty
                        return view("installment.index", compact("installments", "details"));
                    } else {
                        // charge & penalty
                        $user->increment("penalty_charges", $subscription->penalty_amount);
                        $user->last_penalty_date = $today;
                        $user->save();
                    }
                }
            }
        }

        return view("installment.index", compact("installments", "details"));
    }

    function payView(Installment $installment) {
        // $dueDates =  $subscription->installments;
        // $dueDates = Installment::where("subscription_id", $installment->subscription_id)->get();
        $installmentId = $installment->id;

        $details =  Installment::where("subscription_id", $installment->subscription_id)
            ->join("subscriptions", "installments.subscription_id", "=", "subscriptions.id")
            ->join("organizations", "installments.organization_id", "=", "organizations.id")
            ->select(
                "organizations.id as organizationId",
                "subscriptions.id as subscriptionId",
                "subscriptions.name as subscriptionName",
                "subscriptions.type as subscriptionType",
                "subscriptions.penalty_amount as installmentPenaltyAmount",
                "subscriptions.per_amount as installmentPerAmount",
                "organizations.name as organizationName"
            )
            ->first();

        // dd($installment);
        return view("installment.pay", compact("installmentId", "details"));
    }

    function pay(int $organizationId, int $subscriptionId, int $installmentId) {
        InstallmentCollections::create([
            'user_id' => Auth::id(),
            "organization_id" => $organizationId,
            "subscription_id" => $subscriptionId,
            "installment_id" => $installmentId,
        ]);

        return redirect()->route("dashboard.index");
    }

    function penaltyPayView() {
        $org_id = User::find(Auth::id())->organization_id;
        $subs_id = Subscription::where("organization_id", $org_id)->first()->id;
        return view("installment.penalty-pay", compact("subs_id"));
    }

    function penaltyPay(Request $request) {
        $user = User::find(Auth::id());
        $validated =  $request->validate([
            "penalty_charges" => "required|integer|min:50|max:$user->penalty_charges"
        ]);

        $user->decrement("penalty_charges", $validated['penalty_charges']);
        $user->save();
        $org_id = User::find(Auth::id())->organization_id;
        $subs_id = Subscription::where("organization_id", $org_id)->first()->id;
        return redirect()->route("installments.index", $subs_id);
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
