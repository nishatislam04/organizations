<?php

namespace App\Models\Subscription;

use App\Models\Auth\User;
use App\Models\Installment\Installment;
use App\Models\Organization\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model {
    use HasFactory;

    protected $guarded = [];

    function creator() {
        return $this->belongsTo(Organization::class);
    }

    function installments() {
        return $this->hasMany(Installment::class);
    }

    function organization() {
        return  $this->belongsTo(Organization::class);
    }
}
