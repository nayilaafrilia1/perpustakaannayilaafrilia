<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {

            $table->decimal('kembalian', 10, 2)
                  ->default(0)
                  ->after('dibayar');

            $table->enum('statusbayar', [
                'belumbayar',
                'sudahbayar'
            ])
            ->default('belumbayar')
            ->after('tunggakan');

        });
    }

    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {

            $table->dropColumn([
                'kembalian',
                'statusbayar'
            ]);

        });
    }
};