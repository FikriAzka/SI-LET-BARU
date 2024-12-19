<?php

namespace App\Models;

use App\Models\Irs;
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
        return $this->belongsTo(ProgramStudi::class,'jurusan');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function doswal()
    {
        return $this->belongsTo(DosWal::class, 'dos_wal_id');
    }

    
    public function irs()
    {
        return $this->hasMany(IRS::class, 'nim', 'nim'); // 'id' di Mahasiswa, 'nim' di IRS
    }

    
}