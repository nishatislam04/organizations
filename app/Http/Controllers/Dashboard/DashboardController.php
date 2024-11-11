<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Installment\InstallmentCollections;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {
    function dashboard() {
        $user = Auth::user();
        $organizations = Organization::with("user")->simplePaginate(5);

        $superUserData =  $this->getSuperUserData();

        // dd($superUserData);


        if ($user->role === "super") {
            return view("dashboard.dashboard", [
                "superUserData" => $superUserData,

            ]);
        }

        if ($user->status === "passed" && !is_null($user->organization_id)) {
            return view("dashboard.dashboard");
        } else {
            return redirect()->route("organizations.listings", compact("organizations"));
        }
    }

    function getSuperUserData() {
        $latestSubscription = Subscription::with("organization")
            ->latest()
            ->first();
        $userJoiningRequests = User::where("status", "pending")
            ->where("role", "member")
            ->with("organization")
            ->take(15)
            ->get();
        $lastInstallmentCollections = DB::table('installment_collections')
            ->leftJoin('organizations', 'installment_collections.organization_id', '=', 'organizations.id')
            ->leftJoin('subscriptions', 'installment_collections.subscription_id', '=', 'subscriptions.id')
            ->leftJoin('users', 'installment_collections.user_id', '=', 'users.id')
            ->select(
                'installment_collections.*',
                'organizations.name as organization_name',
                'subscriptions.name as subscription_name',
                'subscriptions.per_amount as subscription_per_amount',
                'users.username as username'
            )
            ->orderBy('installment_collections.created_at', 'desc')
            ->take(15)
            ->get();
        $latestCompleteSubscriptions = Subscription::where("complete", "yes")
            ->with("organization")
            ->latest()
            ->take(8)
            ->get();

        $topInstallmentCollections =
            InstallmentCollections::select(
                'installment_collections.subscription_id',
                DB::raw('COUNT(installment_collections.subscription_id) AS subscription_count')
            )
            ->leftJoin('subscriptions', 'installment_collections.subscription_id', '=', 'subscriptions.id')
            ->leftJoin('organizations', 'subscriptions.organization_id', '=', 'organizations.id')
            ->addSelect('subscriptions.per_amount', 'subscriptions.name', 'organizations.name as organization_name')
            ->groupBy('installment_collections.subscription_id')
            ->orderByDesc('subscription_count')
            ->take(3)
            ->get();

        return [
            "latestSubscription" => $latestSubscription,
            "userJoiningRequests" => $userJoiningRequests,
            "lastInstallmentCollections" => $lastInstallmentCollections,
            "latestCompleteSubscriptions" => $latestCompleteSubscriptions,
            "topInstallmentCollections" => $topInstallmentCollections
        ];
    }

    function getAdminUserData() {
    }
}
