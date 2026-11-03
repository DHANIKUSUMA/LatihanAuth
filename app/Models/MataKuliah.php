<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataKuliah extends Model
{

    protected $fillable =[
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'program_studi_id',
    ];

    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
