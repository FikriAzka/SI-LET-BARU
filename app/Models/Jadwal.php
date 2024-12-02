<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'pengampu_2',
        'pengampu_3',
        'ruangan',
        'hari',
        'kelas',
        'jam_mulai',
        'jam_selesai',
        'kuota_kelas',
        'sks',
        'sifat',
        'semester',
    ];


    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
