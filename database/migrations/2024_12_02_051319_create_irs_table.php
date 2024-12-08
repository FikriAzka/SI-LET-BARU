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
            $table->id(); // Primary Key (id)
            $table->unsignedBigInteger('nim'); // Foreign Key ke tabel mahasiswa (id)
            $table->unsignedBigInteger('jadwal_id'); // Foreign Key ke tabel jadwal
            $table->string('semester');
            $table->integer('prioritas')->default(0); // Default prioritas
            $table->integer('nilai'); // Default prioritas

            $table->string('status')->default('pending'); // Status default
            $table->string('status_lulus'); // Status default

            $table->timestamps();

            // Foreign Key Constraints
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