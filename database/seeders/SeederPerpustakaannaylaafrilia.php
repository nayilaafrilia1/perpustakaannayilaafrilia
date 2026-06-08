<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeederPerpustakaannaylaafrilia extends Seeder
{
    public function run(): void
    {
        /*
        |----------------------------------------------------------------------
        | USER
        |----------------------------------------------------------------------
        */
        DB::table('user')->insert([

            [
                'namauser'     => 'Administrator',
                'username'     => 'admin',
                'password'     => Hash::make('admin123'),
                'status'       => 'setujui',
                'role'         => 'admin',
                'foto'         => null,
                'setujui'      => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'namauser'     => 'Petugas Perpustakaan',
                'username'     => 'petugas',
                'password'     => Hash::make('petugas123'),
                'status'       => 'setujui',
                'role'         => 'petugas',
                'foto'         => null,
                'setujui'      => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'namauser'     => 'nayila admin',
                'username'     => 'naylaadmin',
                'password'     => Hash::make('123'),
                'status'       => 'setujui',
                'role'         => 'admin',
                'foto'         => null,
                'setujui'      => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ],

        ]);

        /*
        |----------------------------------------------------------------------
        | KATEGORI
        |----------------------------------------------------------------------
        */
        DB::table('kategori')->insert([

            ['namakategori' => 'Novel', 'created_at' => now(), 'updated_at' => now()],
            ['namakategori' => 'Teknologi', 'created_at' => now(), 'updated_at' => now()],
            ['namakategori' => 'Pendidikan', 'created_at' => now(), 'updated_at' => now()],
            ['namakategori' => 'Agama', 'created_at' => now(), 'updated_at' => now()],
            ['namakategori' => 'Sains', 'created_at' => now(), 'updated_at' => now()],
            ['namakategori' => 'Sejarah', 'created_at' => now(), 'updated_at' => now()],
            ['namakategori' => 'Komik', 'created_at' => now(), 'updated_at' => now()],

        ]);

        /*
        |----------------------------------------------------------------------
        | PEMINJAM
        |----------------------------------------------------------------------
        */
        DB::table('peminjam')->insert([

            [
                'namapeminjam'   => 'Nayila Afrilia',
                'username'       => 'nayila',
                'password'       => Hash::make('nayila123'),
                'status'         => 'setujui',
                'jenis_peminjam' => 'siswa',
                'alamat'         => 'Tasikmalaya',
                'kelas'          => 'XI RPL 2',
                'nisn'           => '1234567890',
                'tahun_akademik' => '2025/2026',
                'setujui'        => now(),
                'foto'           => null,
                'nomorhp'        => '081234567890',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'namapeminjam'   => 'Budi Santoso',
                'username'       => 'budi',
                'password'       => Hash::make('budi123'),
                'status'         => 'setujui',
                'jenis_peminjam' => 'umum',
                'alamat'         => 'Bandung',
                'kelas'          => null,
                'nisn'           => null,
                'tahun_akademik' => null,
                'setujui'        => now(),
                'foto'           => null,
                'nomorhp'        => '081111111111',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'namapeminjam'   => 'Siti Aminah',
                'username'       => 'siti',
                'password'       => Hash::make('siti123'),
                'status'         => 'setujui',
                'jenis_peminjam' => 'siswa',
                'alamat'         => 'Garut',
                'kelas'          => 'XII TKJ 2',
                'nisn'           => '9988776655',
                'tahun_akademik' => '2025/2026',
                'setujui'        => now(),
                'foto'           => null,
                'nomorhp'        => '082222222222',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'namapeminjam'   => 'Ahmad Rizky',
                'username'       => 'ahmad',
                'password'       => Hash::make('ahmad123'),
                'status'         => 'setujui',
                'jenis_peminjam' => 'umum',
                'alamat'         => 'Cirebon',
                'kelas'          => null,
                'nisn'           => null,
                'tahun_akademik' => null,
                'setujui'        => now(),
                'foto'           => null,
                'nomorhp'        => '083333333333',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

        ]);

        /*
        |----------------------------------------------------------------------
        | DENDA
        |----------------------------------------------------------------------
        */
        DB::table('denda')->insert([

            [
                'namadenda'  => 'Denda Terlambat',
                'denda'      => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |----------------------------------------------------------------------
        | BUKU
        |----------------------------------------------------------------------
        */
        DB::table('buku')->insert([

            [
                'idkategori'     => 1,
                'nomorseri'      => 'NVL001',
                'isbn'           => '9786230011111',
                'judul'          => 'Laskar Pelangi',
                'penerbit'       => 'Bentang Pustaka',
                'pengarang'      => 'Andrea Hirata',
                'tahunterbit'    => 2005,
                'tahunpengadaan' => 2025,
                'deskripsi'      => 'Novel pendidikan inspiratif.',
                'status'         => 'tersedia',
                'kondisi'        => 'bagus',
                'rak'            => 'A1',
                'stok'           => 10,
                'foto'           => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'idkategori'     => 2,
                'nomorseri'      => 'TK001',
                'isbn'           => '9786230022222',
                'judul'          => 'Laravel 13 Modern',
                'penerbit'       => 'Informatika',
                'pengarang'      => 'Nayla Developer',
                'tahunterbit'    => 2026,
                'tahunpengadaan' => 2026,
                'deskripsi'      => 'Belajar Laravel modern.',
                'status'         => 'tersedia',
                'kondisi'        => 'bagus',
                'rak'            => 'B2',
                'stok'           => 5,
                'foto'           => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'idkategori'     => 3,
                'nomorseri'      => 'PND001',
                'isbn'           => '9786230033333',
                'judul'          => 'Dasar PHP',
                'penerbit'       => 'Informatika',
                'pengarang'      => 'Andi Code',
                'tahunterbit'    => 2023,
                'tahunpengadaan' => 2025,
                'deskripsi'      => 'Dasar pemrograman PHP.',
                'status'         => 'tersedia',
                'kondisi'        => 'bagus',
                'rak'            => 'C1',
                'stok'           => 8,
                'foto'           => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'idkategori'     => 4,
                'nomorseri'      => 'AGM001',
                'isbn'           => '9786230044444',
                'judul'          => 'Belajar Akhlak',
                'penerbit'       => 'Religi Press',
                'pengarang'      => 'Ustadz Ali',
                'tahunterbit'    => 2020,
                'tahunpengadaan' => 2024,
                'deskripsi'      => 'Buku agama dan akhlak.',
                'status'         => 'tersedia',
                'kondisi'        => 'bagus',
                'rak'            => 'D1',
                'stok'           => 6,
                'foto'           => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

        ]);

        /*
        |----------------------------------------------------------------------
        | PEMINJAMAN
        |----------------------------------------------------------------------
        */
        DB::table('peminjaman')->insert([

            [
                'idpeminjam'   => 1,
                'iduser'       => 2,
                'totaldenda'   => 0,
                'dibayar'      => 0,
                'tunggakan'    => 0,
                'tanggalbayar' => null,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'idpeminjam'   => 2,
                'iduser'       => 2,
                'totaldenda'   => 5000,
                'dibayar'      => 0,
                'tunggakan'    => 5000,
                'tanggalbayar' => null,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],

        ]);

        /*
        |----------------------------------------------------------------------
        | DETAIL PEMINJAMAN
        |----------------------------------------------------------------------
        */
        DB::table('detail_peminjaman')->insert([

            [
                'idpeminjaman'      => 1,
                'idbuku'            => 1,
                'iddenda'           => 1,
                'tanggalpinjam'     => now(),
                'durasipeminjaman'  => 5,
                'tanggalkembali'    => now()->addDays(5),
                'tanggalkembalikan' => null,
                'jumlahharitelat'   => 0,
                'status'            => 'tidakterlambat',
                'keterangan'        => 'belumkembali',
                'denda'             => 0,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'idpeminjaman'      => 2,
                'idbuku'            => 2,
                'iddenda'           => 1,
                'tanggalpinjam'     => now()->subDays(10),
                'durasipeminjaman'  => 5,
                'tanggalkembali'    => now()->subDays(5),
                'tanggalkembalikan' => now(),
                'jumlahharitelat'   => 5,
                'status'            => 'terlambat',
                'keterangan'        => 'sudahkembali',
                'denda'             => 5000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

        ]);

        /*
        |----------------------------------------------------------------------
        | SURAT BEBAS PERPUSTAKAAN
        |----------------------------------------------------------------------
        */
        DB::table('surat_bebas_perpus')->insert([

            [
                'idpeminjam'    => 1,
                'nomor_surat'   => 'SBP-2026-001',
                'tanggal_cetak' => now(),
                'status'        => 'valid',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

        ]);
    }
}