<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
<<<<<<< HEAD
    protected $fillable = ['nom', 'obligatoire'];

    protected $casts = ['obligatoire' => 'boolean'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
=======
    //
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
