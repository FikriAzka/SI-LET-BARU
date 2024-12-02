<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Irs extends Model
{
    //
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'id');
    }
}
