<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = [
            [
                'name' => 'AdminPdfi',
                'email' => 'pdfi@gmail.com',
                'password' => bcrypt('Admin12345678'),
                'level' => 'admin',
                'verification' => 'verified',
            ],
            [
                'name' => 'AdminCabangPdfi',
                'email' => 'cabangpdfi@gmail.com',
                'level' => 'cabang',
                'password' => bcrypt('Cabang!@#$%^&*'),
                'verification' => 'verified',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
