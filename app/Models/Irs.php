<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irs extends Model
{
    use HasFactory;

    protected $table = 'irs';

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'id');
    }
}
