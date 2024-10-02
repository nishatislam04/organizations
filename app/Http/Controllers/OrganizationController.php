<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = $request->input("query") ?? "";

        if (empty($query)) {
            session()->forget("search_result");

            $organizations = Organization::with("user")->with("joinedMembers")->latest()->simplePaginate(5);

            // return view("organizations.index", compact("organizations"));
        } else {
            $organizations = Organization::where("name", "like", "%" . $query . "%")
                ->orWhere("description", "like", "%" . $query . "%")->with("user")->with("joinedMembers")->latest()->simplePaginate(5);
            $count =
                Organization::where("name", "like", "%" . $query . "%")
                ->orWhere("description", "like", "%" . $query . "%")->with("user")->with("joinedMembers")->count();

            session()->flash("search_result", $count);
        }
        return view("organizations.index", compact("organizations", "query"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        return view("organizations.create");
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
        $validated["user_id"] = Auth::id();

        Organization::create($validated);

        return redirect()->route("organizations.index")->with("success", "organization create success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization) {
        return view("organizations.show", compact("organization"));
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

    public function deleteView(Organization $organization) {
        return view("organizations.delete", compact("organization"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization) {
        $organization->delete();

        return redirect()->route("organizations.index")->with("success", "organization delete success");
    }
}
