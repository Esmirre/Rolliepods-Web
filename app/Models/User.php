<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

// Maps onto the `users` table from rolliepods.sql (user_id, full_name, email, password_hash, role).
class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = ['full_name', 'email', 'password_hash', 'role'];
    protected $hidden = ['password_hash'];

    // The password column is called password_hash, so tell Laravel's auth about it.
    public function getAuthPassword(): string
    {
        return $this->password_hash;
    }

    public function getAuthPasswordName(): string
    {
        return 'password_hash';
    }

    // The table has no remember_token column, so "remember me" is not used.
    public function getRememberTokenName()
    {
        return '';
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'tenant_id', 'user_id');
    }
}
