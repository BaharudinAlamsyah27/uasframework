<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
            $table->string('nama_penyewa', 100);
            $table->string('nik', 16);
            $table->text('alamat');
            $table->integer('durasi_sewa');
            $table->integer('total_harga');
            $table->enum('metode_pembayaran', ['tunai', 'transfer', 'kartu_kredit']);
            $table->enum('status_pembayaran', ['menunggu', 'dp', 'lunas', 'batal'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
