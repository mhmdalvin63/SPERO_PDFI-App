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
                'alamat' => '-',
                'no_anggota_idi' => '-',
                'no_anggota_pdfi' => '-',
                'asal_cabang' => '1',
                'tempat_praktek' => '-',
                'status' => 'aktif',
                'bukti_keanggotaan' => '-',
            ],
            [
                'name' => 'AdminCabangPdfi',
                'email' => 'cabangpdfi@gmail.com',
                'alamat' => '-',
                'no_anggota_idi' => '-',
                'no_anggota_pdfi' => '-',
                'asal_cabang' => '1',
                'tempat_praktek' => '-',
                'level' => 'cabang',
                'password' => bcrypt('Cabang!@#$%^&*'),
                'verification' => 'verified',
                'status' => 'aktif',
                'bukti_keanggotaan' => '-',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
