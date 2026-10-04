<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catatan_sesis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klien_id')->constrained('kliens')->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('tahapan', 30); // engagement|assessment|planning|intervention|monitoring|evaluasi|terminasi
            $table->string('judul');
            $table->text('catatan');
            $table->text('tindak_lanjut')->nullable();
            $table->unsignedInteger('durasi_menit')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catatan_sesis');
    }
};
