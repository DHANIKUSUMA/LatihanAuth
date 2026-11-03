<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use App\Models\MataKuliah;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        ProgramStudi::firstOrCreate(
            ['kode_prodi' => 'SI'],
            ['nama_prodi' => 'Sistem Informasi']
        );

        ProgramStudi::firstOrCreate(
            ['kode_prodi' => 'TI'],
            ['nama_prodi' => 'Teknik Informatika']
        );
    }
}

