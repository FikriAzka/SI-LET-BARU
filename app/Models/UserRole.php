<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRole extends Model
{
    //
    //

    use HasFactory;

    // protected $table = 'user_roles'; // Menyebutkan nama tabel pivot secara eksplisit

    protected $fillable = ['dosen_id', 'rolee_id'];

    /**
     * Relasi ke model Dosen.
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    /**
     * Relasi ke model Rolee.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
