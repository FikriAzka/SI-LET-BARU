<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fakultas extends Model
{
    //
    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class);
    }

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
