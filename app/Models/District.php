<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
<<<<<<< HEAD
    protected $fillable = ['nom', 'region'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permits()
    {
        return $this->hasMany(Permit::class);
    }
}
=======
    //
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
