<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            "organization_id" => 1,
            "installment_type" => "monthly",
            "total_installment" => 50,
            "amount_per_installment" => 1000,
            "due_penalty_charge" => 200,
            "installment_start_date" => fake()->monthName(),
        ];
    }
}
