<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Hash;

class PengampuSeeder extends Seeder
{
    public function run(): void
    {
        // Dosen A
        $dosenA = User::where(
            'email',
            'dosen@gmail.com'
        )->firstOrFail();

        // Dosen B
        $dosenB = User::firstOrCreate(
            ['email' => 'dosen2@gmail.com'],
            [
                'name' => 'Bu Dosen B',
                'password' => Hash::make('password'),
            ]
        );

        // Pastikan Dosen B mempunyai role dosen
        $dosenB->assignRole('dosen');

        // Membagi kepemilikan mata kuliah
        MataKuliah::orderBy('id')->get()->each(
            function (MataKuliah $mk, int $i) use ($dosenA, $dosenB) {

                $mk->user_id = $i % 2 === 0
                    ? $dosenA->id
                    : $dosenB->id;

                $mk->save();
            }
        );
    }
}
