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

    public function collected() {
        return  $this->hasMany(InstallmentCollections::class);
    }

    public function scopeDueFromToday($query, $organizationId) {
        return $query->where('organization_id', $organizationId)
            ->whereDate('due_date', '>', now());
    }
}
