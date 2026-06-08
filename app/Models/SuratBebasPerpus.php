<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjam;

class SuratBebasPerpus extends Model
{
    /**
     * TABLE NAME
     */
    protected $table = 'surat_bebas_perpus';

    /**
     * FILLABLE FIELD (sesuai migration kamu)
     */
    protected $fillable = [
        'idpeminjam',
        'nomor_surat',
        'tanggal_cetak',
        'status',
    ];

    /**
     * CASTING (biar tanggal otomatis Carbon)
     */
    protected $casts = [
        'tanggal_cetak' => 'date',
    ];

    /**
     * RELASI: SURAT → PEMINJAM
     */
    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'idpeminjam');
    }
}