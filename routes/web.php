<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Installment\InstallmentController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Member\MemberController;

// Route::get("/", function () {
//   if (Auth::check()) {
//     if (Auth::user()->role === "super")
//       return view("dashboard.dashboard");
//     if (Auth::user()->status === "pending") {
//       return view("organizations.listings");
//     }
//   } else {
//     return redirect()->route("organizations.listings");
//   }
// });

Route::get("/", function () {
  if (Auth::check()) {
    if (Auth::user()->role === "super") {
      return redirect()->route("dashboard.index");
    } elseif (Auth::user()->status === "pending") {
      return view("organizations.listings");
    }
  }
  // Redirect guests to the organization listings page
  return redirect()->route("organizations.listings");
});

Route::middleware("guest")->controller(GoogleController::class)->group(function () {
  Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
  Route::get('auth/google/callback', 'handleGoogleCallback');
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

  Route::middleware("auth")->group(function () {
    Route::post("/logout", "logout")->name("logout");
  });
});

Route::get("/dashboard", [DashboardController::class, "dashboard"])
  ->name("dashboard.index")
  ->middleware("auth");

Route::middleware("guest")->prefix("organizations")->group(function () {
  Route::get("/listings", [OrganizationController::class, "listings"])->name("organizations.listings")->withoutMiddleware("guest");
});

Route::controller(MemberController::class)
  ->prefix("/organizations/{organization}")
  ->name("members.")
  ->group(
    function () {
      Route::post("/join", "store")->name("join");
      Route::post("/hide", "hide")->name("hide");
    }
  );


Route::middleware(["auth", "super-admin"])
  ->controller(OrganizationController::class)
  ->prefix("organizations")
  ->name("organizations.")
  ->group(function () {
    Route::get("", "index")->name("index");

    Route::get("/create", "create")->name("create");

    Route::get("/{organization}/edit", "edit")->name("edit");

    Route::get("/{organization}", "show")->name("show")->withoutMiddleware("super-admin");

    Route::post("/{organizaion}/leave", "leave")->name("leave");

    Route::post("", "store")->name("store");

    Route::delete("/{organization}/delete", "destroy")->name("destroy");

    Route::put("/{organization}", "update")->name("update");
  });


Route::middleware(["auth", "super"])
  ->controller(UserController::class)
  ->prefix("users")
  ->name("users.")
  ->group(function () {
    Route::get("", "index")->name("index");

    Route::get("/create", "create")->name("create");

    Route::get("/{user}/edit", "edit")->name("edit");

    Route::post("/{user}/approve", "approve")->name("approve");

    Route::post("/{user}/reject", "reject")->name("reject");

    Route::post("", "store")->name("store");

    Route::put("/{user}", "update")->name("update");

    Route::delete("/{user}/delete", "destroy")->name("destroy");
  });

Route::controller(SubscriptionController::class)
  ->middleware(['auth'])
  ->prefix("subscriptions")
  ->name("subscriptions.")
  ->group(function () {
    Route::get("/{organization}/create", "create")->name("create");

    Route::get("/{organization}", "index")->name("index");

    Route::post("/{organization}/store", "store")->name("store");
  });

Route::middleware(['auth'])
  ->controller(InstallmentController::class)
  ->prefix("installments")
  ->name("installments.")
  ->group(function () {
    Route::get("/penalty-pay", "penaltyPayView")->name("penaltyPayView");

    Route::get("/{installment}/pay", "payView")->name("payView");

    Route::get("/{subscription}", "index")->name("index");

    Route::post("/penalty-pay", "penaltyPay")->name("penaltyPay");

    Route::post("/pay/{organizaionId}/{subscriptionId}/{installmentId}", "pay")->name("pay");
  });

Route::fallback(fn() => response()->view('errors.404', [], 404));
