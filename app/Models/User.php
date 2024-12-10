<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends AuthenticatableUser implements Authenticatable
{
    use AuthenticatableTrait, HasFactory, Notifiable, HasRoles;


    public function isKetuaUKM()
    {
        return $this->role == 'ketuaMahasiswa';
    }

    public function isAdminSimudah()
    {
        return $this->role === 'adminSimudah';
    }

    public function isPembina()
    {
        return $this->role === 'pembina';
    }

    public function isPelatih()
    {
        return $this->role === 'pelatih';
    }

    public function isBidangKemahasiswaan()
    {
        return $this->role === 'bidangKemahasiswaan';
    }

    public function isAdminKeuangan()
    {
        return $this->role === 'adminKeuangan';
    }

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'username', 'email', 'password', 'role', 'status_user'];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'ukm_id');
    }
}
