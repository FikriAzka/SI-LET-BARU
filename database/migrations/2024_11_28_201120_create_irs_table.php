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
        Schema::create('irs', function (Blueprint $table) {
            $table->id('irs_id');
            $table->char('nim');
            $table->string('nama');
            $table->integer('semester');            
            $table->string('tahun_akademik')->default('2024/2025');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->char('kelas',1);
            $table->integer('sks');
            $table->boolean('status')->default(false);
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_persetujuan')->nullable();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade'); // 


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};
