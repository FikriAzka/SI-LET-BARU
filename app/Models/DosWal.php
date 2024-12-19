<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosWal extends Model
{
    //
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'dos_wal_id');
    }
    

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
