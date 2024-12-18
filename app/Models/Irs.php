<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Irs extends Model
{
    use HasFactory;

    protected $table = 'irs';
    protected $fillable = [
        'nim',
        'jadwal_id',
        'semester',
        'prioritas',
        'nilai',
        'status',
        'status_lulus',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id'); // Pastikan foreign key 'jadwal_id' benar
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

}