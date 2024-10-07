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
            "type" => "monthly",
            "total" => 50,
            "per_amount" => 1000,
            "penalty_amount" => 200,
            "start" => fake()->monthName(),
        ];
    }
}
