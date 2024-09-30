<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('isRole')) {
  function isRole($role) {
    return Auth::check() && Auth::user()->role === $role;
  }
}
