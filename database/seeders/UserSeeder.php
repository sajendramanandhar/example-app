<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (config('app.env') == 'local') {
            Storage::makeDirectory('public/users');

            User::firstOrCreate(
                ['email' => 'admin@example.com'],
                [
                    'name' => 'admin',
                    'email' => 'admin@example.com',
                    'email_verified_at' => now(),
                    'password' => 'password',
                    'remember_token' => Str::random(30),
                ]
            );

            User::factory()
                ->count(50)
                ->create();
        }
    }
}
