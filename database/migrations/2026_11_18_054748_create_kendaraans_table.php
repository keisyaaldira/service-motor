<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_plat')->unique();
            $table->enum('jenis_kendaraan', ['matic', 'manual']);
            $table->string('nomor_stnk')->unique();
            $table->year('tahun_pembuatan');
            $table->string('nama_pemilik');
            $table->string('warna');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
