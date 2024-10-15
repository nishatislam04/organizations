<?php

namespace App\Providers;

use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        View::composer("*", function ($view) {
            $query = request()->query("query", "");
            $view->with("query", $query);
        });

        $superUser = User::where("role", "super")->first();
        $superName = $superUser ? $superUser->username : null;
        View::share('superName', $superName);
    }
}
