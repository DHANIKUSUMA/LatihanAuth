<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('admin');

        // 2. Akun Dosen
        $dosen = User::firstOrCreate(
            ['email' => 'dosen@gmail.com'],
            [
                'name' => 'Pak Dosen',
                'password' => Hash::make('password'),
            ]
        );
        $dosen->assignRole('dosen');

        // 3. Akun Mahasiswa
        $mhs = User::firstOrCreate(
            ['email' => 'mahasiswa@gmail.com'],
            [
                'name' => 'Mahasiswa Teladan',
                'password' => Hash::make('password'),
            ]
        );
        $mhs->assignRole('mahasiswa');
    }
}
