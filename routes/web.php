<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\Subscription;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
  if (Auth::check()) return redirect()->route("dashboard.index");
  else return redirect()->route("auth.login");
});

Route::controller(AuthController::class)->group(function () {

  Route::middleware("guest")->group(function () {
    Route::get("/login", "loginView")->name("login");
    Route::get("/register", "registerView")->name("register");
  });

  Route::name("auth.")->group(function () {
    Route::post("/login", "login")->name("login");
    Route::post("/register", "register")->name("register");
  });

  Route::post("/logout", "logout")->name("logout");
});

Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard.index")->middleware(["auth", "role"]);

Route::middleware(["auth"])
  ->prefix("organizations")
  ->name("organizations.")
  ->controller(OrganizationController::class)
  ->group(function () {

    Route::get("", "index")->name("index");

    Route::get("/{organization}", "show")->name("show");

    Route::post("", "store")->name("store");

    Route::get("/create", "create")->name("create");

    Route::get("/{organization}", "show")->name("show");

    Route::get("/{organization}/edit", "edit")->name("edit");

    Route::put("/{organization}", "update")->name("update");

    Route::delete("/{organization}/delete", "destroy")->name("destroy");
  });

Route::middleware(["auth"])
  ->prefix("users")
  ->name("users.")
  ->controller(UserController::class)->group(function () {
    Route::get("", "index")->name("index");

    Route::get("/create", "create")->name("create");

    Route::post("", "store")->name("store");

    Route::get("/{user}/edit", "edit")->name("edit");

    Route::put("/{user}", "update")->name("update");

    Route::delete("/{user}/delete", "destroy")->name("destroy");

    Route::post("/{user}/approve", "approve")->name("approve");

    Route::post("/{user}/reject", "reject")->name("reject");
  });

Route::get("/subscriptions/create", [SubscriptionController::class, "create"])->name("subscriptions.create");


Route::fallback(fn() => response()->view('errors.404', [], 404));
