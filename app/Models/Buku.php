<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [

        'idkategori',
        'nomorseri',
        'isbn',
        'judul',
        'penerbit',
        'pengarang',
        'tahunterbit',
        'tahunpengadaan',
        'deskripsi',
        'status',
        'kondisi',
        'rak',
        'stok',
        'foto',

    ];

    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'idkategori'
        );
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(
            DetailPeminjaman::class,
            'idbuku'
        );
    }
}