<?php

namespace App\Models;

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

    function joinedMembers() {
        return $this->hasMany(User::class);
    }
}
