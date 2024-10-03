<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
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

    Route::post("/store", "store")->name("store");

    Route::get("/create", "create")->name("create");

    Route::get("/{organization}", "show")->name("show");

    Route::get("/{organization}/edit", "edit")->name("edit");

    Route::put("/{organization}", "update")->name("update");

    Route::delete("/{organization}/delete", "destroy")->name("destroy");
  });

Route::get("/users", [UserController::class, "index"])->name("users.index");

Route::fallback(fn() => response()->view('errors.404', [], 404));
