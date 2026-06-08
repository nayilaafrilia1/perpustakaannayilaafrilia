<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [

        'idpeminjam',
        'iduser',

        'totaldenda',
        'dibayar',
        'kembalian',
        'tunggakan',

        'statusbayar',

        'tanggalbayar',
    ];

    protected $casts = [

        'tanggalbayar' => 'date',

        'totaldenda' => 'decimal:2',
        'dibayar' => 'decimal:2',
        'kembalian' => 'decimal:2',
        'tunggakan' => 'decimal:2',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI PEMINJAM
    |--------------------------------------------------------------------------
    */

    public function peminjam()
    {
        return $this->belongsTo(
            Peminjam::class,
            'idpeminjam'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI USER / PETUGAS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'iduser'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI DETAIL PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function detailPeminjaman()
    {
        return $this->hasMany(
            DetailPeminjaman::class,
            'idpeminjaman'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ALIAS RELASI DETAIL
    |--------------------------------------------------------------------------
    */

    public function detail()
    {
        return $this->hasMany(
            DetailPeminjaman::class,
            'idpeminjaman'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR FORMAT RUPIAH
    |--------------------------------------------------------------------------
    */

    public function getTotalDendaRupiahAttribute()
    {
        return 'Rp ' . number_format(
            $this->totaldenda,
            0,
            ',',
            '.'
        );
    }

    public function getDibayarRupiahAttribute()
    {
        return 'Rp ' . number_format(
            $this->dibayar,
            0,
            ',',
            '.'
        );
    }

    public function getKembalianRupiahAttribute()
    {
        return 'Rp ' . number_format(
            $this->kembalian,
            0,
            ',',
            '.'
        );
    }

    public function getTunggakanRupiahAttribute()
    {
        return 'Rp ' . number_format(
            $this->tunggakan,
            0,
            ',',
            '.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    public function getIsLunasAttribute()
    {
        return $this->statusbayar === 'sudahbayar';
    }

    public function getStatusPembayaranBadgeAttribute()
    {
        return $this->statusbayar === 'sudahbayar'
            ? 'success'
            : 'danger';
    }
}