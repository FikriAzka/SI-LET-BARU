<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    //
    use HasFactory;


    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'semester',
        'sks',
        'sifat',
        'kelas'
    ];


    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
