<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kliens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_panggilan');
            $table->unsignedInteger('usia')->nullable();
            $table->string('jenis_kelamin', 20)->nullable(); // Laki-laki | Perempuan
            $table->string('kontak')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_intake')->nullable();
            $table->string('status', 20)->default('aktif'); // aktif | selesai
            $table->text('catatan_umum')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kliens');
    }
};
