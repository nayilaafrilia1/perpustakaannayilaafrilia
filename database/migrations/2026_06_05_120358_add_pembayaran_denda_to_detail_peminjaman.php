<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_peminjaman', function (Blueprint $table) {

            // nominal denda yang dibayar
            $table->decimal('denda_bayar', 10, 2)->default(0)->after('denda');

            // status pembayaran denda
            $table->enum('status_denda', [
                'belum_bayar',
                'lunas'
            ])->default('belum_bayar')->after('denda_bayar');

            // metode pembayaran
            $table->enum('metode_bayar', [
                'cash',
                'transfer'
            ])->nullable()->after('status_denda');

        });
    }

    public function down(): void
    {
        Schema::table('detail_peminjaman', function (Blueprint $table) {
            $table->dropColumn([
                'denda_bayar',
                'status_denda',
                'metode_bayar'
            ]);
        });
    }
};