<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dekan extends Model
{
    //
    // Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // Relasi ke Fakultas
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
