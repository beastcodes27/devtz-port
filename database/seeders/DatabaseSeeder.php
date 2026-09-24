<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default super-admin team members
        User::updateOrCreate(
            ['email' => 'admin@devtz.com'],
            [
                'name' => 'DevTZ Architect',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'beast@devtz.com'],
            [
                'name' => 'DevTZ Beast Admin',
                'password' => Hash::make('pass123'),
                'email_verified_at' => now(),
            ]
        );

        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
            CompanyStatSeeder::class,
            TestimonialSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
