<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $fillable = [

        'user_id',

        'permit_type',

        'surface',

        'status',

        'risk_score',

        'risk_level',

        'ai_priority',

        'technical_review_required',

        'ai_recommendations'
    ];

    protected $casts = [

        'ai_recommendations' => 'array',

        'technical_review_required' => 'boolean'
    ];
}