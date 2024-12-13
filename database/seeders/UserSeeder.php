<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create the specified first user as a teacher
        User::create([
            'name' => 'Aminodiin',
            'email' => 'aminodiin1995@gmail.com',
            'number' => '77049495',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'email_verified_at' => now(),
        ]);

        // Create 50 teachers and 49 parents
        for ($i = 0; $i < 99; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'number' => $faker->numerify('77######'),
                'password' => Hash::make('password'),
                'role' => $i < 50 ? 'teacher' : 'parent',
                'email_verified_at' => now(),
            ]);
        }

        // Log the completion

    }
}
