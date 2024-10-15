<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = $request->input("query") ?? "";
        $sortBy = $request->input("sortBy");
        $sortDir = $request->input("sortDir");

        if ($sortBy || $sortDir) {
            // IMPLEMENT : sorting on search_result

            session()->forget("search_result");

            $organizations = Organization::join("users", "organizations.user_id", "=", "users.id")
                ->select("users.*", "users.id as userId", "organizations.*", "organizations.id as organizationId")
                ->orderBy($sortBy, $sortDir)
                ->simplePaginate(5);

            return view("organizations.index", compact("organizations", "sortBy", "sortDir"));
        }

        if (empty($query)) {
            session()->forget("search_result");

            if (Auth::user()->role === "super") {
                $organizations = Organization::leftJoin('users', 'organizations.user_id', '=', 'users.id')
                    ->select(
                        'users.*',
                        'users.id as userId',
                        'organizations.*',
                        'organizations.id as organizationId'
                    )
                    ->simplePaginate(5);
            }
            if (Auth::user()->role === "admin") {

                $organizations = Organization::join("users", "users.organization_id", "=", "organizations.id")
                    ->select("users.*", "users.id as userId", "organizations.*", "organizations.id as organizationId")
                    ->first();
                // using first() bcz admin can have only one organization

            }
        } else {

            $organizations = Organization::where("name", "like", "%" . $query . "%")
                ->join("users", "organizations.user_id", "=", "users.id")
                ->select("users.*", "users.id as userId", "organizations.*", "organizations.id as organizationId")
                ->simplePaginate(5)
                ->appends(['query' => $query]);

            $count = $organizations->count();

            session()->flash("search_result", $count);
        }

        return view(
            "organizations.index",
            compact("organizations", "sortBy", "sortDir")
        );
    }

    function listings() {
        $superName = User::where("role", "super")->first()->username;
        // $organizations = Organization::where("user_id", null)->simplePaginate(10);
        $organizations = Organization::with("user")->simplePaginate();

        // dd($organizations);


        return view(
            "organizations.listings",
            compact("superName", "organizations")
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        return view("organizations.create");
    }

    public function show(Organization $organization) {
        $organization = Organization::where("organizations.id", $organization->id)
            ->join("users", "organizations.user_id", "=", "users.id")
            ->select("users.*", "users.id as userId", "organizations.*", "organizations.id as organizationId")
            ->get()[0];

        return view("organizations.show", compact("organization"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            "name" => "required|string|min:3|max:254",
            "description" => "required|string",
            "max_members" => "required|integer|min_digits:1"
        ]);

        Organization::create($validated);

        return redirect()->route("organizations.index")->with("success", "organization create success");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization) {
        return view("organizations.edit", compact("organization"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization) {
        $validated = $request->validate([
            "name" => "required|string|min:3|max:254",
            "description" => "required|string",
            "max_members" => "required|integer|min_digits:1"
        ]);
        $organization->name = $validated['name'];
        $organization->description = $validated['description'];
        $organization->max_members = $validated['max_members'];

        $organization->save();

        return redirect()->route("organizations.index")->with("success", "organization update success");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization) {

        $user_id = $organization->user_id;
        $organization->delete();

        // check if the user role is super or not
        $role = User::find($user_id)->role;

        if ($role !== "super") {
            $user = User::find($user_id);
            $user->status = null;
            $user->organization_id = null;
            $user->save();
            return redirect()->route("organizations.index")->with("success", "organization and user  profile updated");
        }

        return redirect()->route("organizations.index")->with("success", "organization delete success");
    }
}
