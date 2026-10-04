<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asesmens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klien_id')->constrained('kliens')->cascadeOnDelete();
            $table->text('masalah');
            $table->text('riwayat_masalah')->nullable();
            // Keberfungsian BPSS
            $table->text('bpss_biologis')->nullable();
            $table->text('bpss_kebutuhan_dasar')->nullable();
            $table->text('bpss_psikologis')->nullable();
            $table->text('bpss_sosial_budaya')->nullable();
            $table->text('bpss_spiritual')->nullable();
            // Sistem dukungan
            $table->text('dukungan_keluarga')->nullable();
            $table->text('dukungan_keagamaan')->nullable();
            $table->text('dukungan_lingkungan')->nullable();
            // Potensi
            $table->text('potensi_kekuatan')->nullable();
            $table->text('potensi_kekurangan')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asesmens');
    }
};
