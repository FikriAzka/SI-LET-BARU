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
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00',
                'pengampu_2'=> null,
                'pengampu_3'=> null,
                'status' => 'Disetujui'
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
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
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
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '25',
                'dosen_id'=> '3',
                'hari'=> 'Selasa',
                'ruangan'=> 'R002',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'C',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '22',
                'dosen_id'=> '1',
                'hari'=> 'Selasa',
                'ruangan'=> 'R002',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'C',
                'semester'=>  '3',
                'jam_mulai'=> '07:00',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '22',
                'dosen_id'=> '1',
                'hari'=> 'Kamis',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'E',
                'semester'=>  '3',
                'jam_mulai'=> '07:00',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '22',
                'dosen_id'=> '1',
                'hari'=> 'Rabu',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'A',
                'semester'=>  '3',
                'jam_mulai'=> '07:00',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '22',
                'dosen_id'=> '1',
                'hari'=> 'Jumat',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'B',
                'semester'=>  '3',
                'jam_mulai'=> '07:00',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '24',
                'dosen_id'=> '5',
                'hari'=> 'Senin',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'B',
                'semester'=>  '3',
                'jam_mulai'=> '13:00',
                'jam_selesai'=> '16:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '24',
                'dosen_id'=> '5',
                'hari'=> 'Selasa',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'C',
                'semester'=>  '3',
                'jam_mulai'=> '13:00',
                'jam_selesai'=> '16:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '24',
                'dosen_id'=> '5',
                'hari'=> 'Rabu',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'D',
                'semester'=>  '3',
                'jam_mulai'=> '13:00',
                'jam_selesai'=> '16:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '24',
                'dosen_id'=> '5',
                'hari'=> 'Kamis',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '4',
                'sifat'=> 'Wajib',
                'kelas'=> 'E',
                'semester'=>  '3',
                'jam_mulai'=> '13:00',
                'jam_selesai'=> '16:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '23',
                'dosen_id'=> '7',
                'hari'=> 'Senin',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'E',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '23',
                'dosen_id'=> '7',
                'hari'=> 'Rabu',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'C',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '23',
                'dosen_id'=> '7',
                'hari'=> 'Kamis',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'D',
                'semester'=>  '3',
                'jam_mulai'=> '13:00',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '23',
                'dosen_id'=> '7',
                'hari'=> 'Kamis',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'A',
                'semester'=>  '3',
                'jam_mulai'=> '13:00',
                'jam_selesai'=> '10:20',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '25',
                'dosen_id'=> '6',
                'hari'=> 'Senin',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'C',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '25',
                'dosen_id'=> '6',
                'hari'=> 'Selasa',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'D',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '25',
                'dosen_id'=> '6',
                'hari'=> 'Rabu',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'B',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '25',
                'dosen_id'=> '6',
                'hari'=> 'Kamis',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'A',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
            [
                'mata_kuliah_id' => '25',
                'dosen_id'=> '6',
                'hari'=> 'Jumat',
                'ruangan'=> 'A001',
                'kuota_kelas'=> '50',
                'sks'=> '3',
                'sifat'=> 'Wajib',
                'kelas'=> 'E',
                'semester'=>  '3',
                'jam_mulai'=> '09:40',
                'jam_selesai'=> '12:10',
                'pengampu_2'=> null,
                'pengampu_3'=> null, 
                'status' => 'Disetujui'
            ],
        ]);
    }
}
