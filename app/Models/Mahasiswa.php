<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $primaryKey = 'nim';
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function doswal()
    {
        return $this->belongsTo(DosWal::class, 'doswal_id');
    }

    public function irs()
    {
        return $this->hasMany(Irs::class, 'mahasiswa_id', 'id');
    }

}