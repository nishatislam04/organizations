<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Installment\Installment;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Organization $organization) {
        $paid = 0;
        $subscriptions = Subscription::where("organization_id", $organization->id)->latest()
            ->get();
        $moneyCollected = DB::table('subscriptions')
            ->join('installment_collections', 'subscriptions.organization_id', '=', 'installment_collections.organization_id')
            ->where('subscriptions.organization_id', $organization->id)
            ->where('installment_collections.user_id', Auth::id())
            ->select('subscriptions.*', 'installment_collections.*', 'subscriptions.per_amount')
            ->get();

        if (count($moneyCollected) > 1) {
            $paid = count($moneyCollected) * $moneyCollected[0]->per_amount;
        }


        $today = CarbonImmutable::createFromFormat("d-m-Y", date("d-m-Y"));
        $tomorrow = $today->addDays();
        $yestarday = $today->subDays();
        foreach ($subscriptions as $subscription) {
            if ($yestarday->isSameDay($subscription->end)) {
                $subscription->complete = "yes";
                $subscription->save();
            }
        }

        return view("subscriptions.index", compact("organization", "subscriptions", "paid"));
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
            "name" => "required|min:3|unique:subscriptions,name",
            "type" => "required|in:monthly,yearly",
            "total" => "required|integer",
            "per_amount" => "required|integer",
            "penalty_amount" => "required|integer",
            "start" => "required|regex:/\d{2}-\d{2}-\d{4}/"
        ]);

        $validated["organization_id"] = $organization->id;
        $validated['end'] = "placeholder";

        $subs =  Subscription::create($validated);

        $organization_id = $organization->id;
        $subscription_id = $subs->id;
        $name = $validated['name'];
        $pay_amount = $validated['per_amount'];
        $start_date = $validated['start'];
        $total = $validated["total"];

        /**
         * create installments & return the last  installment
         */
        $lastInstallment = $this->createInstallment([
            'organization_id' => $organization_id,
            'subscription_id' => $subscription_id,
            "name" => $name,
            'pay_amount' => $pay_amount,
            'start_date' => $start_date,
            'total' => $total
        ]);

        $subs->end = $lastInstallment['due_date'];
        $subs->save();

        return redirect()->route("organizations.show", $organization->id)->with("success", "subscription create success");
    }

    function createInstallment($data) {
        $all_installments = [];

        list($day, $month, $year) = explode("-", $data['start_date']);


        for ($i = 0; $i < $data['total']; $i++) {
            if ((int) $month === 12) {
                $month = 0;
                $year++;
            }

            $due_date = (int) $year . "-" . (int) $month + 1 . "-" . (int)$day;
            $all_installments[] = [
                'organization_id' => $data['organization_id'],
                "subscription_id" => $data['subscription_id'],
                "due_date" => $due_date,
                "created_at" => date("Y-m-d"),
                "updated_at" =>  date("Y-m-d")
            ];

            $month++;
        }

        DB::transaction(function () use ($all_installments) {
            Installment::insert($all_installments);
        });

        return end($all_installments);
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
