<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'permit_id', 'archived_by', 'archive_date', 'archive_reason',
    ];

    protected $casts = ['archive_date' => 'datetime'];

    public function permit()
    {
        return $this->belongsTo(Permit::class);
    }

    public function archivedBy()
    {
        return $this->belongsTo(User::class, 'archived_by');
    }
}
=======
    //
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
