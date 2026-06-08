<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Denda;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';

    protected $fillable = [

        'idpeminjaman',
        'idbuku',
        'iddenda',

        'tanggalpinjam',
        'durasipeminjaman',
        'tanggalkembali',
        'tanggalkembalikan',

        'jumlahharitelat',

        'status',
        'keterangan',

        'denda',
    ];

    protected $casts = [

        'tanggalpinjam' => 'date',
        'tanggalkembali' => 'date',
        'tanggalkembalikan' => 'date',

        'denda' => 'decimal:2',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function peminjaman()
    {
        return $this->belongsTo(
            Peminjaman::class,
            'idpeminjaman'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI BUKU
    |--------------------------------------------------------------------------
    */

    public function buku()
    {
        return $this->belongsTo(
            Buku::class,
            'idbuku'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI DENDA
    |--------------------------------------------------------------------------
    */

    public function dendaMaster()
    {
        return $this->belongsTo(
            Denda::class,
            'iddenda'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPE BELUM KEMBALI
    |--------------------------------------------------------------------------
    */

    public function scopeBelumKembali($query)
    {
        return $query->where(
            'keterangan',
            'belumkembali'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPE SUDAH KEMBALI
    |--------------------------------------------------------------------------
    */

    public function scopeSudahKembali($query)
    {
        return $query->where(
            'keterangan',
            'sudahkembali'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CEK TERLAMBAT
    |--------------------------------------------------------------------------
    */

    public function getIsTerlambatAttribute()
    {
        return $this->jumlahharitelat > 0;
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS TERLAMBAT
    |--------------------------------------------------------------------------
    */

    public function getStatusTerlambatAttribute()
    {
        return $this->jumlahharitelat > 0
            ? 'Terlambat'
            : 'Tidak Terlambat';
    }

    /*
    |--------------------------------------------------------------------------
    | BADGE STATUS PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function getBadgeStatusAttribute()
    {
        return $this->keterangan === 'sudahkembali'
            ? 'success'
            : 'warning';
    }
    public function dendaRelasi()
    {
        return $this->hasOne(
            Denda::class,
            'iddetailpeminjaman',
            'id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | FORMAT DENDA
    |--------------------------------------------------------------------------
    */

    public function getDendaRupiahAttribute()
    {
        return 'Rp ' . number_format(
            $this->denda,
            0,
            ',',
            '.'
        );
    }
}
