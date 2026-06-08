<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Peminjam extends Authenticatable
{
    use Notifiable;

    protected $table = 'peminjam';

    protected $primaryKey = 'id';

    /*
    |----------------------------------------
    | MASS ASSIGNMENT
    |----------------------------------------
    */
    protected $fillable = [
        'namapeminjam',
        'username',
        'password',
        'status',
        'jenis_peminjam',
        'alamat',
        'kelas',
        'nisn',
        'tahun_akademik',
        'nomorhp',
        'foto',
        'setujui',
    ];

    /*
    |----------------------------------------
    | HIDDEN (biar password tidak tampil)
    |----------------------------------------
    */
    protected $hidden = [
        'password',
    ];

    /*
    |----------------------------------------
    | CASTING DATA
    |----------------------------------------
    */
    protected $casts = [
        'setujui'   => 'datetime',
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
}