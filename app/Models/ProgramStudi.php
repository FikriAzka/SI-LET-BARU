<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    //
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function ruangs()
    {
        return $this->hasMany(Ruang::class);
    }

    public function kaprodi()
    {
        return $this->hasMany(Kaprodi::class, 'program_studi_id');
    }


}
