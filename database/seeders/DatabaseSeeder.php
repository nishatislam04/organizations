<?php

namespace Database\Seeders;

use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use App\Models\Auth\User;
use App\Models\Installment\Installment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        User::factory(1)->create([
            'username' => "nio",
            'email' => "nishatislam3108@gmail.com",
            'password' => "1234",
            "role" => "super",
        ]);
        Organization::factory(5)->create();
        Subscription::factory(3)->create();
        // Generate 15 unique users with specified attributes
        for ($i = 0; $i < 5; $i++) {
            User::factory()->create([
                'username' => fake()->unique()->userName(), // Ensuring unique username
                'email' => fake()->unique()->email(),
                'password' => bcrypt('1234'), // Encrypting password for security
                'role' => 'member',
                'status' => 'pending',
                'penalty_charges' => 0,
                'last_penalty_date' => null,
                'joining_date' => null,
                'remember_token' => null,
                'google_id' => null,
                'avatar' => null,
                'organization_id' => 1
            ]);
        }

        // seed Installments
        $subscriptions = Subscription::all();

        // For each subscription, create 5 installments
        foreach ($subscriptions as $subscription) {
            Installment::factory()->count(5)->create([
                'subscription_id' => $subscription->id, // Ensure installments are linked to this subscription
            ]);
        }
    }
}
