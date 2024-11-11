<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Installment\Installment;
use App\Models\Installment\InstallmentCollections;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller {
    function dashboard() {
        $user = Auth::user();
        $organizations = Organization::with("user")->simplePaginate(5);

        if (Auth::user()->role === "super") $superUserData =  $this->getSuperUserData();


        // if (Auth::user()->role === "admin") {
        $organizationId = Auth::user()->organization_id;
        $latestSubscriptions = Subscription::latest()
            ->take(5)
            ->get();

        $overview = DB::table('users')
            ->select([
                DB::raw("(SELECT COUNT(*) FROM users WHERE organization_id = {$organizationId}) AS total_members"),
                DB::raw("(SELECT COUNT(*) FROM subscriptions WHERE organization_id = {$organizationId}) AS total_subscriptions"),
                DB::raw("(SELECT COUNT(*) FROM installment_collections WHERE organization_id = {$organizationId}) AS total_installments")
            ])
            ->first();

        $mostPenaltyChargedUsers = User::where('organization_id', Auth::user()->organization_id)
            ->where('penalty_charges', '>', 0)
            ->orderBy('penalty_charges', 'desc')
            ->take(5)
            ->get();

        $organizationActiveSince = Organization::where("user_id", Auth::user()->id)->first();

        $topSubscriptions = Subscription::where("organization_id", Auth::user()->organization_id)->take(5)->get();

        $lastInstallmentCollections = InstallmentCollections::where("organization_id", Auth::user()->organization_id)->with("subscription")->with("user")->take(5)->get();

        // dd($lastInstallmentCollections);
        // }

        if ($user->role === "super") {
            return view("dashboard.dashboard", [
                "superUserData" => $superUserData,
            ]);
        }

        if ($user->role === "admin")
            return view("dashboard.dashboard", [
                "overview" => $overview,
                "mostPenaltyChargedUsers" => $mostPenaltyChargedUsers,
                "organizationActiveSince" => $organizationActiveSince,
                "topSubscriptions" => $topSubscriptions,
                "lastInstallmentCollections" => $lastInstallmentCollections
                // "adminUserData" => $superUserData,
            ]);


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
            ->take(10)
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
