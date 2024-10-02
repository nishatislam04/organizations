<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Models\Organization;
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

Route::get("/organizations/create", [OrganizationController::class, "create"])->name("organizations.create");

Route::get("/organizations/{organization}", [OrganizationController::class, "show"])->name("organizations.show");

Route::get("/organizations/{organization}/edit", [OrganizationController::class, "edit"])->name("organizations.edit");

Route::put("/organizations/{organization}", [OrganizationController::class, "update"])->name("organizations.update");

Route::get("/organizations/{organization}/delete", [OrganizationController::class, "deleteView"])->name("organizations.deleteView");

Route::delete("/organizations/{organization}/delete", [OrganizationController::class, "destroy"])->name("organizations.destroy");

// Route::get("/organizations/search", [OrganizationController::class, "search"])->name("organizations.search");

Route::fallback(fn() => response()->view('errors.404', [], 404));
