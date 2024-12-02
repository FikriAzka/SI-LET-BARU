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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'dos_wal_id')->constrained('dos_wals')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('fakultas_id')->constrained('fakultas')->cascadeOnDelete(); // Relasi ke fakultas
            $table->foreignId('jurusan')->constrained('program_studis')->cascadeOnDelete(); // Relasi ke program studi
            $table->string('nim')->unique(); // NIM mahasiswa
            $table->string('nama_lengkap'); // Nama lengkap mahasiswa
            $table->enum('jenis_kelamin', ['L', 'P']); // Jenis kelamin
            $table->text('alamat')->nullable(); // Alamat mahasiswa
            $table->string('no_hp')->nullable(); // Nomor telepon
            $table->integer('semester');
            $table->year('angkatan');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
