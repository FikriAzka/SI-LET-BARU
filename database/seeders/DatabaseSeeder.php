<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Panggil seeder lain jika diperlukan
        $this->call(RoleSeeder::class);
        $this->call(FakultasSeeder::class);
        $this->call(ProgramStudiSeeder::class);
        $this->call(DoswalSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(AkademikSeeder::class);
        $this->call(DosWalKapSeeder::class);
        $this->call(DosWalDekSeeder::class);
        $this->call(KaprodiSeeder::class);
        $this->call(DekanSeeder::class);
        $this->call(MatKulSeeder::class);
        $this->call(RuangSeeder::class);
        $this->call(JadwalSeeder::class);
        
        
    }
}
