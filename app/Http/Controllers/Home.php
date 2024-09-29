<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class Home extends Controller {
    public function index() {
        // Assuming the first user for demo purposes
        $user = User::first()->organizations;

        // Fetch all organizations for the user
        // $organizations = $user->;

        dd($user); // Dump the organizations to check if data is fetched
    }
}
