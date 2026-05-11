<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
<<<<<<< HEAD
    protected $fillable = ['nom'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
=======
    //
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
