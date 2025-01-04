<?php

namespace Database\Factories\Installment;

use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class InstallmentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'subscription_id' => Subscription::inRandomOrder()->first()->id,
            'organization_id' => Organization::inRandomOrder()->first()->id,
            'due_date' => Carbon::now()->addMonths(rand(1, 5))->format('Y-m-d'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
