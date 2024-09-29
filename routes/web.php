<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard.admin');
// })->name("home");
Route::get("/", [Home::class, "index"])->name("test");
