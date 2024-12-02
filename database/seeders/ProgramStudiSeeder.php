<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Program studi 
        ProgramStudi::create([
            'nama_program_studi' => 'S1 Teknik Informatika',
            'fakultas_id' => 1,
        ]);

        ProgramStudi::create([
            'nama_program_studi' => 'S1 Teknik Sipil',
            'fakultas_id' => 2,
        ]);

        
    }
}
