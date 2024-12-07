<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    protected $fillable = ['nama', 'nip'];

    /**
     * Relasi many-to-many dengan Rolee melalui tabel user_roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'dosen_id', 'role_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kaprodi (One-to-One)
    public function kaprodi()
    {
        return $this->hasOne(Kaprodi::class, 'dosen_id');
    }

    // Relasi ke Dekan (One-to-One)
    public function dekan()
    {
        return $this->hasOne(Dekan::class, 'dosen_id');
    }

    // Relasi ke Doswal (One-to-Many)
    public function doswal()
    {
        return $this->hasMany(Doswal::class, 'dosen_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'dosen_id');
    }
}
