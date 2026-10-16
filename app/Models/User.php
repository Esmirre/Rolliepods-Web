<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'full_name',
        'email',
        'password_hash',
        'role',
    ];

    protected $hidden = [
        'password_hash',
    ];

    public function getAuthPassword(): string
    {
        return $this->password_hash;
    }

    public function getAuthPasswordName(): string
    {
        return 'password_hash';
    }

    public function getRememberTokenName(): string
    {
        return '';
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'tenant_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id', 'user_id');
    }
}
