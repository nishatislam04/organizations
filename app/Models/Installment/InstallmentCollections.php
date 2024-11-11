<?php

namespace App\Models\Installment;

use App\Models\Auth\User;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentCollections extends Model {
    use HasFactory;

    protected $guarded = [];

    function installment() {
        return  $this->belongsTo(Installment::class);
    }

    function organization() {
        $this->belongsTo(Organization::class);
    }

    function subscription() {
        return $this->belongsTo(Subscription::class);
    }
    function subscriptionInstallemnt() {
        return $this->installment->belongsTo(Subscription::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFromUserOrganization($query, $organizationId) {
        return $query->where('organization_id', $organizationId);
    }
}
