<?php

use App\Models\Installment\Installment;
use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use App\Models\Auth\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('installment_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Organization::class)->constrained();
            $table->foreignIdFor(Subscription::class)->constrained();
            $table->foreignIdFor(Installment::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('installment_collections');
    }
};
