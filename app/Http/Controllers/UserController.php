<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // search users
        $query = $request->input("query") ?? "";

        if (empty($query)) {
            session()->forget("search_result");

            $users = User::latest()->simplePaginate(5);
        } else {
            $users = User::where("username", "like", "%" . $query . "%")->latest()->simplePaginate(5)->appends(["query" => $query]);
            $count = $users->count();
            session()->flash("search_result", $count);
        }

        // getting pending users data
        // $usersAndOrganizations = DB::table('users')
        //     ->where('users.status', '=', 'pending')
        //     ->join('organizations', 'users.organization_id', '=', 'organizations.id')
        //     ->select(
        //         'users.id as user_id',
        //         'users.username',
        //         'users.email',
        //         'users.password',
        //         'users.role',
        //         'users.status',
        //         'users.organization_id',
        //         'organizations.id as organization_id',
        //         'organizations.name',
        //         'organizations.description',
        //         'organizations.max_members',
        //     )
        //     ->get();


        // $pendingUsers = User::where("status", "=", "pending")->get();
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $superRoleId = User::where("role", "=", "super")->get();
        $superRoleId = $superRoleId[0]->id;

        $organizations = Organization::where("user_id", $superRoleId)->get();
        return view("users.create", compact("organizations"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            "username" => "required|min:3|max:254",
            "email" => "required|email",
            "password" => "required",
            "organization_id" => "required",
        ]);
        $validated['role'] = "admin";
        $validated['status'] = "passed";

        // create a new user
        $user = User::create($validated);

        // update the existing user_id on organization table
        $organization = Organization::findOrFail($validated['organization_id']);
        $organization->user_id = $user->id;
        $organization->save();

        return redirect()->route("users.index")->with("success", "user create & assign success");
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

    function approve(User $user) {

        // update org with user id
        $organization = Organization::find($user->organization_id);
        $organization->user_id = $user->id;
        $organization->save();

        $user->status = "passed";
        $user->save();

        // delete rest of the users when 
        // current user got assigned to the current org
        $org_id = $user->organization_id;

        User::where([
            ['id', '!=', $user->id],
            ['organization_id', '=', $org_id],
            ['status', '=', 'pending'],
        ])->delete();

        return redirect()->route("users.index")->with("success", "user approve success");
    }

    function reject(User $user) {
        $user->delete();
        return redirect()->route("users.index")->with("success", "user reject success");
    }
}
