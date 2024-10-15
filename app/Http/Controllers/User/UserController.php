<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\UserApprovedMail;
use App\Mail\UserRejectedMail;
use App\Models\Organization\Organization;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = $request->input("query") ?? "";
        $sortBy = $request->input("sortBy");
        $sortDir = $request->input("sortDir");

        $superId = User::where("role", "super")->get()[0]->id;
        $availableOrganizations = Organization::where("user_id", null)->get()->count();

        if ($sortBy || $sortDir) {
            session()->forget("search_result");

            $users =
                User::join("organizations", "users.organization_id", "organizations.id")
                ->select("users.id as userId", "users.*", "organizations.name", "organizations.id as organizationId")
                ->orderBy($sortBy, $sortDir)
                ->simplePaginate(5);

            return view("users.index", compact("users", "sortBy", "sortDir", "availableOrganizations"));
        }

        if (empty($query)) {
            session()->forget("search_result");

            $users = User::join("organizations", "users.organization_id", "organizations.id")
                ->select("users.id as userId", "users.*", "organizations.name", "organizations.id as organizationId")
                ->latest()
                ->simplePaginate(5);
        } else {
            $users = User::where("username", "like", "%" . $query . "%")->join("organizations", "users.organization_id", "organizations.id")
                ->select("users.id as userId", "users.*", "organizations.name", "organizations.id as organizationId")
                ->latest()
                ->simplePaginate(5)
                ->appends(["query" => $query]);

            $count = $users->count();
            session()->flash("search_result", $count);
        }

        return view("users.index", compact("users", "availableOrganizations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        $organizations = Organization::where("user_id", null)->get();
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
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        $validated = $request->validate([
            "username" => "required|min:3|max:254",
            "email" => "required|email",
        ]);

        $user->username = $validated['username'];
        $user->email = $validated['email'];

        $user->save();
        return redirect()->route("users.index")->with("success", "user update success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        $superId = User::where("role", "super")->get()[0]->id;
        $orgId = $user->organization_id;
        // delete user
        $user->delete();

        //update org info
        $org = Organization::find($orgId);
        $org->user_id = $superId;
        $org->save();

        return redirect()->route("users.index")->with("success", "user delete success");
    }

    function approve(User $user) {

        // update org with user id
        $organization = Organization::find($user->organization_id);
        $organization->user_id = $user->id;
        $organization->save();

        $user->status = "passed";
        $user->save();

        Mail::to($user->email)->send(new UserApprovedMail($organization, $user));

        // update rest of the users when 
        // current user got assigned to the current org
        $org_id = $user->organization_id;

        $rejectedUsers = User::where([
            ['id', '!=', $user->id],
            ['organization_id', '=', $org_id],
            ['status', '=', 'pending'],
        ])->get();

        foreach ($rejectedUsers as $user) {
            $user->status = null;
            $user->organization_id = null;
            $user->save();
            Mail::to($user->email)->send(new UserRejectedMail());
        }

        return redirect()->route("users.index")->with("success", "user approve success");
    }

    function reject(User $user) {
        $user->status = null;
        $user->organization_id = null;
        $user->save();

        return redirect()->route("users.index")->with("success", "user reject success");
    }
}
