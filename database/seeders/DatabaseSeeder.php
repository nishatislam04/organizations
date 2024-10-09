<?php

namespace Database\Seeders;

use App\Models\Organization\Organization;
use App\Models\Subscription\Subscription;
use App\Models\Auth\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(1)->create();
        User::factory(1)->create([
            'username' => "nio",
            'email' => "nishatislam318@gmail.com",
            'password' => "1234",
            "role" => "super",
        ]);

        // User::factory(5)->create([
        //     'username' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'password' => Hash::make('password'),
        //     "role" => "member",
        //     "organization_id" => 1,
        // ]);
        Organization::factory(5)->create();
        Subscription::factory(3)->create();
    }
}
