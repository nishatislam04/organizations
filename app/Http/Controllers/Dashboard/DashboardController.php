<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    function dashboard() {
        $user = Auth::user();
        $organizations = Organization::with("user")->simplePaginate(5);

        if ($user->role === "super") {
            return view("dashboard.dashboard");
        }

        if ($user->status === "passed" && !is_null($user->organization_id)) {
            return view("dashboard.dashboard");
        } else {
            return redirect()->route("organizations.listings", compact("organizations"));
        }
    }
}
