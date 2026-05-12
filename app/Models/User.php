<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'cin', 'role_id', 'district_id',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function permitsAsCitizen()
    {
        return $this->hasMany(Permit::class, 'citizen_id');
    }

    public function permitsAsArchitect()
    {
        return $this->hasMany(Permit::class, 'architect_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'uploaded_by');
    }

    public function technicalReviews()
    {
        return $this->hasMany(TechnicalReview::class, 'reviewed_by');
    }

    public function archives()
    {
        return $this->hasMany(Archive::class, 'archived_by');
    }

    public function apiTokens()
    {
        return $this->hasMany(UserApiToken::class);
    }

    public function isCitoyen(): bool
    {
        return in_array($this->role?->nom, ['citoyen', 'مواطن', 'ممثل الشخص المعنوي'], true);
    }

    public function isArchitecte(): bool
    {
        return in_array($this->role?->nom, ['architecte', 'مهندس معماري', 'مهندس مساح طوبوغرافي', 'مهندس مختص'], true);
    }

    public function isAgent(): bool
    {
        return in_array($this->role?->nom, ['agent_urbanisme', 'ممثل منعش عقاري', 'ممثل جماعة ترابية', 'عضو اللجنة', 'ممثل متعهد شركة الاتصالات', 'ممثل متعهد شركة شبكات الماء والكهرباء'], true);
    }

    public function isTechnical(): bool
    {
        return $this->role?->nom === 'service_technique';
    }

    public function isAdmin(): bool
    {
        return $this->role?->nom === 'administrateur';
    }
}
