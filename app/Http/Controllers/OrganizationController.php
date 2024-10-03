<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = $request->input("query") ?? "";  // Get the search query
        $sortBy = $request->input("sortBy", 'name');  // Sort by 'name' if not provided
        $sortDir = $request->input("sortDir", 'asc'); // Sort direction default to 'asc'

        // If no search query, retrieve all organizations
        if (empty($query)) {
            session()->forget("search_result"); // Clear search result from session

            // Fetch and paginate organizations with sorting
            $organizations = Organization::with("user", "joinedMembers")
                ->orderBy($sortBy, $sortDir)
                ->simplePaginate(5);  // Paginate with 5 results per page
        } else {
            // Search organizations by name or description
            $organizations = Organization::where("name", "like", "%" . $query . "%")
                ->with("user", "joinedMembers")
                ->orderBy($sortBy, $sortDir)
                ->simplePaginate(5)
                ->appends(['query' => $query]); // Keep the query in pagination links

            // Count total results for the search
            $count = Organization::where("name", "like", "%" . $query . "%")
                ->count();

            session()->flash("search_result", $count);  // Flash the result count for display
        }

        // Pass organizations, sortBy, and sortDir to the view
        return view("organizations.index", compact("organizations", "sortBy", "sortDir"));
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
        // what if the 'super' deleted a organization where 
        //  already a user wanted to join or user already
        // is admin over there
        $organization->delete();

        return redirect()->route("organizations.index")->with("success", "organization delete success");
    }
}
