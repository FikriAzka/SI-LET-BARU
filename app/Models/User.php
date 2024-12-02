<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function akademik()
    {
        return $this->hasOne(Akademik::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function userRole()
    {
        return $this->hasOne(UserRole::class);
    }

    public function role()
    {
        return $this->hasOneThrough(
            Role::class,
            UserRole::class,
            'user_id', // Foreign key on user_roles table
            'id', // Foreign key on rolees table
            'id', // Local key on users table
            'rolee_id' // Local key on user_roles table
        );
    }
}