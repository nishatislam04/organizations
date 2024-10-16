<?php

namespace App\Models\Installment;

use App\Models\Subscription\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model {
    use HasFactory;

    protected $guarded = [];

    function subscription() {
        return $this->belongsTo(Subscription::class);
    }

    function collected() {
        return  $this->hasMany(InstallmentCollections::class);
    }
}
