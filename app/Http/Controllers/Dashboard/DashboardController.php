<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    function dashboard() {

        return view("dashboard.dashboard");
    }
}
