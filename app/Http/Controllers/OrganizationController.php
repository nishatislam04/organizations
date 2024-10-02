<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = $request->input("query") ?? "";
        $sortBy = $request->input("sortBy", 'name'); // Default to 'name' if not set
        $sortDir = $request->input("sortDir", 'asc'); // Default to 'asc' if not set

        if (empty($query)) {
            session()->forget("search_result");

            // Sort the organizations if sorting parameters are present
            if ($sortBy && $sortDir) {
                $organizations = Organization::with("user", "joinedMembers")
                    ->orderBy($sortBy, $sortDir)
                    ->simplePaginate(5);
            } else {
                // Default to latest if no sorting is provided
                $organizations = Organization::with("user", "joinedMembers")
                    ->latest()
                    ->simplePaginate(5);
            }
        } else {
            // Search organizations by name or description
            $organizations = Organization::where("name", "like", "%" . $query . "%")
                ->with("user", "joinedMembers")
                ->orderBy($sortBy, $sortDir)
                ->simplePaginate(5); // Paginate over search results

            // Count the results for search feedback
            $count = Organization::where("name", "like", "%" . $query . "%")
                ->count();

            session()->flash("search_result", $count);
        }

        // Pass the query, sortBy, and sortDir to the view for pagination
        return view("organizations.index", compact("organizations", "query", "sortBy", "sortDir"));
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
