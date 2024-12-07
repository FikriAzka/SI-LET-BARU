<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwals')->insert([
            [
                'mata_kuliah_id' => '22',
                'dosen_id'=> '1',
                'hari'=> 'Senin',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'A',
                'semester'=>  '3',
                'jam_mulai'=> '07.00',
                'jam_selesai'=> '10.20',
                'pengampu_2'=> null,
                'pengampu_3'=> null,
            ],
            [
                'mata_kuliah_id' => '24',
                'dosen_id'=> '1',
                'hari'=> 'Senin',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'A',
                'semester'=>  '3',
                'jam_mulai'=> '07.00',
                'jam_selesai'=> '10.20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
            ],
            [
                'mata_kuliah_id' => '23',
                'dosen_id'=> '3',
                'hari'=> 'Selasa',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'B',
                'semester'=>  '3',
                'jam_mulai'=> '07.00',
                'jam_selesai'=> '10.20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
            ],
        ]);
    }
}
