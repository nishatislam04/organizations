<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Installment\InstallmentController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\User\UserController;
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

Route::get("/dashboard", [DashboardController::class, "dashboard"])
  ->name("dashboard.index")
  ->middleware(["auth"]);

Route::middleware(["auth", "super-admin"])
  ->prefix("organizations")
  ->name("organizations.")
  ->controller(OrganizationController::class)
  ->group(function () {

    Route::get("", "index")->name("index");

    Route::get("/create", "create")->name("create");

    Route::get("/{organization}", "show")->name("show");

    Route::post("", "store")->name("store");

    Route::get("/{organization}", "show")->name("show");

    Route::get("/{organization}/edit", "edit")->name("edit");

    Route::put("/{organization}", "update")->name("update");

    Route::delete("/{organization}/delete", "destroy")->name("destroy");
  });

Route::middleware(["auth", "super"])
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

Route::get("/subscriptions/{organization}/", [SubscriptionController::class, "index"])->name("subscriptions.index");
Route::get("/subscriptions/{organization}/create", [SubscriptionController::class, "create"])->name("subscriptions.create");
Route::post("/subscriptions/{organization}/store", [SubscriptionController::class, "store"])->name("subscriptions.store");


Route::get("/installments/{subscription}", [InstallmentController::class, "index"])->name("installments.index");


Route::fallback(fn() => response()->view('errors.404', [], 404));
