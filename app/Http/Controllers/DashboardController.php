<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    function dashboard() {

        return view("dashboard.dashboard");
    }
}
