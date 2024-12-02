<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }
}
