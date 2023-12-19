<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    use AuthenticatableTrait, HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'username', 'email', 'password'];

    // ... mungkin ada properti atau metode tambahan lainnya

    // Contoh metode tambahan:
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
