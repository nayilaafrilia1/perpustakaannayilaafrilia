<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        Schema::create('user', function (Blueprint $table) {

            $table->id();

            $table->string('namauser');

            $table->string('username')->unique();

            $table->string('password');

            $table->enum('status', [
                'pending',
                'setujui',
                'tolak'
            ])->default('pending');

            $table->enum('role', [
                'admin',
                'petugas'
            ]);

            $table->string('foto')->nullable();

            $table->timestamp('setujui')->nullable();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        Schema::create('kategori', function (Blueprint $table) {

            $table->id();

            $table->string('namakategori');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | PEMINJAM
        |--------------------------------------------------------------------------
        */

        Schema::create('peminjam', function (Blueprint $table) {

            $table->id();

            $table->string('namapeminjam');

            $table->string('username')->unique();

            $table->string('password');

            $table->enum('status', [
                'pending',
                'setujui',
                'tolak'
            ])->default('pending');

            $table->enum('jenis_peminjam', [
                'siswa',
                'guru',
                'umum'
            ])->default('siswa');

            $table->text('alamat');

            $table->string('kelas')->nullable();

            $table->string('nisn')->nullable();

            $table->string('tahun_akademik')->nullable();

            $table->string('nomorhp')->nullable();

            $table->string('foto')->nullable();

            $table->timestamp('setujui')->nullable();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | DENDA
        |--------------------------------------------------------------------------
        */

        Schema::create('denda', function (Blueprint $table) {

            $table->id();

            $table->string('namadenda');

            $table->decimal('denda', 10, 2);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | BUKU
        |--------------------------------------------------------------------------
        */

        Schema::create('buku', function (Blueprint $table) {

            $table->id();

            $table->foreignId('idkategori')
                ->constrained('kategori')
                ->onDelete('cascade');

            $table->string('nomorseri');

            $table->string('isbn')->nullable();

            $table->string('judul');

            $table->string('penerbit');

            $table->string('pengarang');

            $table->smallInteger('tahunterbit')->nullable();

            $table->smallInteger('tahunpengadaan')->nullable();

            $table->text('deskripsi')->nullable();

            $table->enum('status', [
                'tersedia',
                'dipinjam',
                'rusak',
                'hilang'
            ])->default('tersedia');

            $table->enum('kondisi', [
                'bagus',
                'rusak'
            ])->default('bagus');

            $table->string('rak');

            $table->integer('stok')->default(0);

            $table->string('foto')->nullable();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Schema::create('peminjaman', function (Blueprint $table) {

            $table->id();
            $table->foreignId('idpeminjam')
                ->constrained('peminjam')
                ->onDelete('cascade');
            $table->foreignId('iduser')
                ->constrained('user')
                ->onDelete('cascade');
            $table->decimal('totaldenda', 10, 2)
                ->default(0);
            $table->decimal('dibayar', 10, 2)
                ->default(0);
            $table->decimal('tunggakan', 10, 2)
                ->default(0);
            $table->date('tanggalbayar')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | DETAIL PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idpeminjaman')
                ->constrained('peminjaman')
                ->onDelete('cascade');
            $table->foreignId('idbuku')
                ->constrained('buku')
                ->onDelete('cascade');
            $table->foreignId('iddenda')
                ->nullable()
                ->constrained('denda')
                ->onDelete('set null');
            $table->date('tanggalpinjam');
            $table->integer('durasipeminjaman')
                ->default(5);
            $table->date('tanggalkembali');
            $table->date('tanggalkembalikan')
                ->nullable();
            $table->integer('jumlahharitelat')
                ->default(0);
            $table->enum('status', [
                'terlambat',
                'tidakterlambat'
            ])->default('tidakterlambat');
            $table->enum('keterangan', [
                'sudahkembali',
                'belumkembali'
            ])->default('belumkembali');
            $table->decimal('denda', 10, 2)
                ->default(0);
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | SURAT BEBAS PERPUSTAKAAN
        |--------------------------------------------------------------------------
        */

        Schema::create('surat_bebas_perpus', function (Blueprint $table) {

            $table->id();
            $table->foreignId('idpeminjam')
                ->constrained('peminjam')
                ->onDelete('cascade');
            $table->string('nomor_surat')->unique();
            $table->date('tanggal_cetak');
            $table->enum('status', [
                'valid',
                'dibatalkan'
            ])->default('valid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_bebas_perpus');
        Schema::dropIfExists('detail_peminjaman');
        Schema::dropIfExists('peminjaman');
        Schema::dropIfExists('buku');
        Schema::dropIfExists('denda');
        Schema::dropIfExists('peminjam');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('user');
    }
};