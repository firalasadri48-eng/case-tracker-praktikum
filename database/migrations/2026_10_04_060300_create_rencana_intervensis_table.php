<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rencana_intervensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klien_id')->constrained('kliens')->cascadeOnDelete();
            $table->text('tujuan_smart');
            $table->string('teori_model')->nullable();
            $table->text('metode_pendekatan')->nullable();
            $table->string('skala_prioritas')->nullable();
            $table->date('tanggal_rencana');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rencana_intervensis');
    }
};
