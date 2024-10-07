<?php

namespace Database\Factories\Organization;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            "name" => fake()->company(),
            "description" => fake()->sentence(6),
            "max_members" => 10,
            "user_id" => 1,
        ];
    }
}
