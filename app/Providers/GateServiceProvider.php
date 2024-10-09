<?php

namespace App\Providers;

use App\Models\Auth\User;
use App\Models\Organization\Organization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GateServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {

        Gate::define("is-super", function (User $user) {
            return $user->role === "super";
        });

        Gate::define("is-admin", function (User $user) {
            return $user->role === "admin";
        });

        Gate::define("is-admin-or-super", function (User $user) {
            return in_array($user->role, ["super", "admin"]);
        });

        Gate::define("org-delete", function (User $user, Organization $organization) {
            // return $user->id === $organization->user_id || $user->role === "super";
            return $user->role === "super";
        });

        Gate::define("org-edit", function (User $user, Organization $organization) {
            // return $user->id === $organization->user_id || $user->role === "super";
            return $user->role === "super";
        });

        Gate::define("user-edit", function (User $user) {
            return $user->role === "super";
        });

        Gate::define("user-delete", function (User $user) {
            return $user->role === "super";
        });
    }
}
