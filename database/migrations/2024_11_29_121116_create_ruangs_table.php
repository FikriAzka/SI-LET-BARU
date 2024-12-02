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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('noruang')->unique();
            $table->string('blokgedung');
            $table->string('lantai');
            $table->string('fungsi');
            $table->string('kapasitas');
            $table->string('keterangan')->default('Tersedia');
            $table->string('status')->default('Pending');
            $table->foreignId('program_studi_id')->constrained('program_studis')->cascadeOnDelete(); // Relasi ke program studi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangs');
    }
};
