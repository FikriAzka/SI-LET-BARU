<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    //
    // Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // Relasi ke Prodi
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }

}
