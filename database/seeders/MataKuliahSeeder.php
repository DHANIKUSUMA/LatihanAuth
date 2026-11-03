<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $si = ProgramStudi::where('kode_prodi', 'SI')
            ->firstOrFail();

        $ti = ProgramStudi::where('kode_prodi', 'TI')
            ->firstOrFail();

        $data = [
            [
                'kode_mk' => 'SI101',
                'nama_mk' => 'Algoritma dan Pemrograman',
                'sks' => 3,
                'semester' => 1,
                'program_studi_id' => $si->id,
            ],
            [
                'kode_mk' => 'SI102',
                'nama_mk' => 'Basis Data',
                'sks' => 3,
                'semester' => 2,
                'program_studi_id' => $si->id,
            ],
            [
                'kode_mk' => 'SI103',
                'nama_mk' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3,
                'program_studi_id' => $si->id,
            ],
            [
                'kode_mk' => 'SI104',
                'nama_mk' => 'Keamanan Web',
                'sks' => 2,
                'semester' => 5,
                'program_studi_id' => $si->id,
            ],
            [
                'kode_mk' => 'TI101',
                'nama_mk' => 'Struktur Data',
                'sks' => 3,
                'semester' => 2,
                'program_studi_id' => $ti->id,
            ],
            [
                'kode_mk' => 'TI102',
                'nama_mk' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 3,
                'program_studi_id' => $ti->id,
            ],
        ];

        foreach ($data as $item) {
            MataKuliah::firstOrCreate(
                ['kode_mk' => $item['kode_mk']],
                $item
            );
        }
    }
}
