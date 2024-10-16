<?php

namespace App\Models\Installment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentCollections extends Model {
    use HasFactory;

    protected $guarded = [];

    function installment() {
        return  $this->belongsTo(Installment::class);
    }
}
