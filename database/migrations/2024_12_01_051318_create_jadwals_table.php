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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliahs')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('hari', 50);
            $table->string('ruangan', 10);
            $table->integer('kuota_kelas');
            $table->integer('sks');
            $table->string('sifat', 15);
            $table->string('kelas', 1);
            $table->integer('semester');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('pengampu_2', 50)->nullable();
            $table->string('pengampu_3', 50)->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
