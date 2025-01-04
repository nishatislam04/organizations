<?php

namespace Database\Factories\Subscription;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            "organization_id" => 1,
            "name" => fake()->name(),
            "type" => "monthly",
            "total" => 50,
            "per_amount" => 1000,
            "penalty_amount" => 200,
            "start" => $startMonth = fake()->monthName(),
            "end" => Carbon::parse("first day of $startMonth")->addMonth()->format('F'),
        ];
    }
}
