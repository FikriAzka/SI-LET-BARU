<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'hari',
        'ruangan',
        'kuota_kelas',
        'sks', 
        'sifat',
        'kelas',
        'semester',
        'jam_mulai',
        'jam_selesai',
        'pengampu_2',
        'pengampu_3',
        'status'
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function dosen() 
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruangan', 'noruang');
    }

    public function irs()
    {
        return $this->hasMany(IRS::class, 'jadwal_id');
    }

}