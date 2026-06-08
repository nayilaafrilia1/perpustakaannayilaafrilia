<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'denda';

    protected $fillable = [
        'namadenda',
        'denda'
    ];

    public function detailPeminjaman()
    {
        return $this->hasMany(
            DetailPeminjaman::class,
            'iddenda'
        );
    }
}