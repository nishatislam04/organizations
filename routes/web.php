<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

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

Route::get("/organizations/", [OrganizationController::class, "index"])->name("organizations.index");
Route::post("/organizations/store", [OrganizationController::class, "store"])->name("organizations.store");


Route::fallback(fn() => response()->view('errors.404', [], 404));
