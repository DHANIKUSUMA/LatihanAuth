<?php

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\User;

it('shows the selected mata kuliah details', function () {
    $this->actingAs(User::factory()->create());

    $programStudi = ProgramStudi::create([
        'kode_prodi' => 'TI',
        'nama_prodi' => 'Teknik Informatika',
    ]);

    $mataKuliah = MataKuliah::create([
        'kode_mk' => 'IF101',
        'nama_mk' => 'Pemrograman Dasar',
        'sks' => 3,
        'semester' => 1,
        'program_studi_id' => $programStudi->id,
    ]);

    $this->get(route('mata-kuliah.show', $mataKuliah))
        ->assertOk()
        ->assertSee('Pemrograman Dasar')
        ->assertSee('Teknik Informatika');
});

it('shows the selected mata kuliah in the edit form', function () {
    $this->actingAs(User::factory()->create());

    $programStudi = ProgramStudi::create([
        'kode_prodi' => 'TI',
        'nama_prodi' => 'Teknik Informatika',
    ]);

    $mataKuliah = MataKuliah::create([
        'kode_mk' => 'IF101',
        'nama_mk' => 'Pemrograman Dasar',
        'sks' => 3,
        'semester' => 1,
        'program_studi_id' => $programStudi->id,
    ]);

    $this->get(route('mata-kuliah.edit', $mataKuliah))
        ->assertOk()
        ->assertSee('value="Pemrograman Dasar"', false)
        ->assertSee('value="IF101"', false);
});
