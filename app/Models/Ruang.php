<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruang extends Model
{
    //
    use HasFactory;

    protected $table = 'ruangs'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'noruang',
        'blokgedung',
        'lantai',
        'fungsi',
        'kapasitas',
        'keterangan',
        'program_studi_id',
        'status',
    ];

    
        public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }
}
