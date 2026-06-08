<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [

        'namauser',
        'username',
        'password',

        'status',
        'role',

        'foto',
        'setujui',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'setujui' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function peminjaman()
    {
        return $this->hasMany(
            Peminjaman::class,
            'iduser'
        );
    }
}