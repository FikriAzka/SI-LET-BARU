<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    //
    // protected $fillable = ['user_id', 'nama', 'nip', 'jenis_kelamin'];
    // protected $primaryKey = ['nip'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
