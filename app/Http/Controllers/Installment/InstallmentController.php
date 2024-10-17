<?php

namespace App\Http\Controllers\Installment;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Installment\Installment;
use App\Models\Installment\InstallmentCollections;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Carbon\Carbon;
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
        $today = Carbon::now();
        list($currMonth, $currYear) = [date("n"), date("Y")];
        $user = User::find(Auth::id());
        foreach ($installments as $installment) {
            $dueDate = Carbon::createFromFormat("d-m-Y", $installment->due_date);
            if ($today->isSameDay($dueDate)) {
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
        /**
         * this calculation is only for current month. where we check
         * due date is greaterThan joiningDate.
         * if due date is grater than joining date & payment history could not 
         * found on 'installment_collections' charge the user with penalty charge
         */
        $isPayed =  Installment::where("due_date", "LIKE", "%$currMonth-$currYear%")
            ->where("subscription_id", "=", $subscription->id)
            ->first();
        $dueDate = Carbon::createFromFormat("d-m-Y", $isPayed->due_date);
        // $t = InstallmentCollections::where("installment_id", $isPayed->id)->first();


        // if ($dueDate->greaterThan($joiningDate)) {
        //     // since user is old, we check if the user made the payment
        //     // if not, we make him pay

        //     if ($currDate->greaterThanOrEqualTo($dueDate)) {
        //         // check if user Already penaltied
        //         // if current date is Already greater than due date
        //         // we may penalty him, if we did not already yet!

        //         $user = User::find(Auth::id());
        //         $alreadyPenalty = $user->last_penalty_date;

        //         if (!is_null($alreadyPenalty)) {
        //             return view("installment.index", compact("installments", "details"));
        //         }
        //     }

        //     $shouldPay = InstallmentCollections::where("subscription_id", "=", $subscription->id)->where("installment_id", "=", $isPayed->id)->first();

        //     if (is_null($shouldPay)) {
        //         $user = User::where("id", Auth::id())->increment("penalty_charges", $subscription->penalty_amount);

        //         $user = User::find(Auth::id());
        //         $user->last_penalty_date = date("j-n-Y");
        //         $user->save();
        //     }
        // } elseif ($dueDate->equalTo($joiningDate)) {
        //     // no penalty for cuurent month

        // }
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
        dd($request->all());
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
