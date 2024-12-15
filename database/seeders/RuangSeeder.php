<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('ruangs')->insert([
            [
                'noruang' => 'A001',
                'blokgedung' => 'A',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'R002',
                'blokgedung' => 'B',
                'lantai' => '2',
                'fungsi' => 'Laboratorium',
                'kapasitas' => '25',
                'program_studi_id' => 2 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A303',
                'blokgedung' => 'A',
                'lantai' => '3',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A101',
                'blokgedung' => 'A',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A102',
                'blokgedung' => 'A',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A103',
                'blokgedung' => 'A',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A201',
                'blokgedung' => 'A',
                'lantai' => '2',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A202',
                'blokgedung' => 'A',
                'lantai' => '2',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A203',
                'blokgedung' => 'A',
                'lantai' => '2',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A301',
                'blokgedung' => 'A',
                'lantai' => '3',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'A302',
                'blokgedung' => 'A',
                'lantai' => '3',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'B101',
                'blokgedung' => 'B',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'B102',
                'blokgedung' => 'B',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'B103',
                'blokgedung' => 'B',
                'lantai' => '1',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'B201',
                'blokgedung' => 'B',
                'lantai' => '2',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'B202',
                'blokgedung' => 'B',
                'lantai' => '2',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
            [
                'noruang' => 'B203',
                'blokgedung' => 'B',
                'lantai' => '2',
                'fungsi' => 'Ruang Kuliah',
                'kapasitas' => '30',
                'program_studi_id' => 1 // Pastikan ID ini sesuai dengan data di tabel `program_studis`
            ],
        ]);
    }
}
