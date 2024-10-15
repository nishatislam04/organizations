<?php

namespace App\Models\Organization;

use App\Models\Auth\User;
use App\Models\Subscription\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model {
    use HasFactory;

    protected $guarded = [];

    function user() {
        return $this->belongsTo(User::class);
    }

    function subscriptions() {
        return $this->hasMany(Subscription::class);
    }

    function members() {
        return $this->hasMany(User::class);
    }
}
