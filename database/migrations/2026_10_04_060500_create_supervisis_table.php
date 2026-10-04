<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supervisis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('jenis', 30); // Supervisi I | Supervisi II | Supervisi III
            $table->string('topik');
            $table->text('hasil_diskusi')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supervisis');
    }
};
