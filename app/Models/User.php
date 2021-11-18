<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'patronymic',
        'surname',
        'role',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsAdminAttribute(): bool
    {
        return $this->getAttribute('role') === 'admin';
    }

    public function getIsManagerAttribute(): bool
    {
        return $this->getAttribute('role') === 'manager';
    }

    public function getIsUserAttribute(): bool
    {
        return $this->getAttribute('role') === 'user';
    }
}
