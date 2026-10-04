<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_hours', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('kegiatan');
            $table->string('tahapan', 30)->nullable();
            $table->decimal('durasi_jam', 5, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_hours');
    }
};
