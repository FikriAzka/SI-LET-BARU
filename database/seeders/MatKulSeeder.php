<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatKulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Daftar mata kuliah
        DB::table('mata_kuliahs')->insert([
            ['kode_mk' => 'PAIK6101', 'nama_mk' => 'Matematika I', 'semester' => 1, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6102', 'nama_mk' => 'Dasar Pemrograman', 'semester' => 1, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6103', 'nama_mk' => 'Dasar Sistem', 'semester' => 1, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6104', 'nama_mk' => 'Logika Informatika', 'semester' => 1, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6105', 'nama_mk' => 'Struktur Diskrit', 'semester' => 1, 'sks' => 4, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00003', 'nama_mk' => 'Pancasila dan Kewarganegaraan', 'semester' => 1, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00005', 'nama_mk' => 'Olahraga', 'semester' => 1, 'sks' => 1, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00007', 'nama_mk' => 'Bahasa Inggris', 'semester' => 1, 'sks' => 2, 'sifat' => 'W'],
            
            ['kode_mk' => 'PAIK6201', 'nama_mk' => 'Matematika II', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6202', 'nama_mk' => 'Algoritma dan Pemrograman', 'semester' => 2, 'sks' => 4, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6203', 'nama_mk' => 'Organisasi dan Arsitektur Komputer', 'semester' => 2, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6204', 'nama_mk' => 'Aljabar Linier', 'semester' => 2, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00004', 'nama_mk' => 'Bahasa Indonesia', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00006', 'nama_mk' => 'Internet of Things (IoT)', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00011', 'nama_mk' => 'Pendidikan Agama Islam', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00021', 'nama_mk' => 'Pendidikan Agama Kristen', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00031', 'nama_mk' => 'Pendidikan Agama Katolik', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00041', 'nama_mk' => 'Pendidikan Agama Hindu', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00051', 'nama_mk' => 'Pendidikan Agama Buddha', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00061', 'nama_mk' => 'Pendidikan Agama Kong Hu Chu', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00071', 'nama_mk' => 'Aliran Kepercayaan terhadap Tuhan Yang Maha Esa', 'semester' => 2, 'sks' => 2, 'sifat' => 'W'],

            ['kode_mk' => 'PAIK6301', 'nama_mk' => 'Struktur Data', 'semester' => 3, 'sks' => 4, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6302', 'nama_mk' => 'Sistem Operasi', 'semester' => 3, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6303', 'nama_mk' => 'Basis Data', 'semester' => 3, 'sks' => 4, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6304', 'nama_mk' => 'Metode Numerik', 'semester' => 3, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6305', 'nama_mk' => 'Interaksi Manusia dan Komputer', 'semester' => 3, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6306', 'nama_mk' => 'Statistika', 'semester' => 3, 'sks' => 2, 'sifat' => 'W'],

            ['kode_mk' => 'PAIK6401', 'nama_mk' => 'Pemrograman Berorientasi Objek', 'semester' => 4, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6402', 'nama_mk' => 'Jaringan Komputer', 'semester' => 4, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6403', 'nama_mk' => 'Manajemen Basis Data', 'semester' => 4, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6404', 'nama_mk' => 'Grafika dan Komputasi Visual', 'semester' => 4, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6405', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'semester' => 4, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6406', 'nama_mk' => 'Sistem Cerdas', 'semester' => 4, 'sks' => 3, 'sifat' => 'W'],

            ['kode_mk' => 'PAIK6501', 'nama_mk' => 'Pengembangan Berbasis Platform', 'semester' => 5, 'sks' => 4, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6502', 'nama_mk' => 'Komputasi Tersebar dan Paralel', 'semester' => 5, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6503', 'nama_mk' => 'Sistem Informasi', 'semester' => 5, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6504', 'nama_mk' => 'Proyek Perangkat Lunak', 'semester' => 5, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6505', 'nama_mk' => 'Pembelajaran Mesin', 'semester' => 5, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6506', 'nama_mk' => 'Keamanan dan Jaminan Informasi', 'semester' => 5, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'UUW00008', 'nama_mk' => 'Kewirausahaan', 'semester' => 5, 'sks' => 2, 'sifat' => 'W'],

            ['kode_mk' => 'PAIK6601', 'nama_mk' => 'Analisis dan Strategi Algoritma', 'semester' => 6, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6602', 'nama_mk' => 'Uji Perangkat Lunak', 'semester' => 6, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6603', 'nama_mk' => 'Masyarakat dan Etika Profesi', 'semester' => 6, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6604', 'nama_mk' => 'Praktik Kerja Lapangan', 'semester' => 0, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6605', 'nama_mk' => 'Manajemen Proyek', 'semester' => 6, 'sks' => 3, 'sifat' => 'W'],

            ['kode_mk' => 'PAIK6701', 'nama_mk' => 'Metodologi Penelitian dan Penulisan Ilmiah', 'semester' => 0, 'sks' => 2, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6702', 'nama_mk' => 'Teori Bahasa dan Otomata', 'semester' => 7, 'sks' => 3, 'sifat' => 'W'],
            ['kode_mk' => 'PAIK6703', 'nama_mk' => 'Metode Perangkat Lunak', 'semester' => 7, 'sks' => 3, 'sifat' => 'P'],
            ['kode_mk' => 'PAIK6704', 'nama_mk' => 'Kualitas Perangkat Lunak', 'semester' => 7, 'sks' => 3, 'sifat' => 'P'],
            ['kode_mk' => 'PAIK6705', 'nama_mk' => 'Pemodelan dan Simulasi', 'semester' => 7, 'sks' => 3, 'sifat' => 'P'],
            ['kode_mk' => 'PAIK6706', 'nama_mk' => 'Visi Komputer', 'semester' => 7, 'sks' => 3, 'sifat' => 'P'],
                    
        ]);
        
            
        
    }
}
