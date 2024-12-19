<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'semester',
        'sks',
        'sifat',
        'kelas',
        'dosen_id'
    ];

    // Definisikan relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'mata_kuliah_id');
    }
}