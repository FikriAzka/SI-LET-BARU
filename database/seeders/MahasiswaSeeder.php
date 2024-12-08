<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\UserRole;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data mahasiswa
        $mahasiswaData = [
            [
                'password' => bcrypt('123'),
                'nim' => '24060120120001',
                'nama_lengkap' => 'Aulia Putri',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Raya No. 1, Jakarta',
                'no_hp' => '081234567890',
                'semester' => 5,
                'ipk' => '3.56',
                'ips' => '3.2',
                'sks' => '24',
                'total_sks' => '90',
                'status' => 'Aktif',// masih aktif
                'angkatan' => 2022,
                'program_studi_id' => 2,
                'fakultas_id' => 1,
                'dos_wal_id' => 1, 
            ],
            [
                'password' => bcrypt('123'),
                'nim' => '24060120120002',
                'nama_lengkap' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Raya No. 2, Bandung',
                'semester' => 5,
                'ipk' => '3.99',
                'ips' => '3.8',
                'total_sks' => '100',
                'sks' => '24',
                'status' => 'Aktif',// masih aktif
                'angkatan' => 2023,
                'no_hp' => '089876543210',
                'program_studi_id' => 2,
                'fakultas_id' => 2,
                'dos_wal_id' => 1,
            ],
            [
                'password' => bcrypt('123'),
                'nim' => '24060120120004',
                'nama_lengkap' => 'Aldinjay',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Raya No. 2, Bandung',
                'semester' => 6,
                'ipk' => '3.99',
                'ips' => '2.8',
                'total_sks' => '100',
                'sks' => '24',
                'status' => 'Aktif',// masih aktif
                'angkatan' => 2022,
                'no_hp' => '089876543210',
                'program_studi_id' => 2,
                'fakultas_id' => 2,
                'dos_wal_id' => 1,
            ],
            [
                'password' => bcrypt('123'),
                'nim' => '24060120120005',
                'nama_lengkap' => 'Ganyu Can',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Raya No. 2, adsdsd',
                'semester' => 3,
                'ipk' => '3.99',
                'ips' => '2.3',
                'total_sks' => '100',
                'sks' => '24',
                'status' => 'Aktif',// masih aktif
                'angkatan' => 2022,
                'no_hp' => '089876543210',
                'program_studi_id' => 2,
                'fakultas_id' => 2,
                'dos_wal_id' => 1,
            ],
            [
                'password' => bcrypt('123'),
                'nim' => '24060120120006',
                'nama_lengkap' => 'Mikaasa njay',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Raya No. 2, aaaa',
                'semester' => 2,
                'ipk' => '3.99',
                'ips' => '1.7',
                'total_sks' => '100',
                'sks' => '24',
                'status' => 'Aktif',// masih aktif
                'angkatan' => 2022,
                'no_hp' => '089876543210',
                'program_studi_id' => 2,
                'fakultas_id' => 2,
                'dos_wal_id' => 1,
            ]
        ];

        // Membuat user dan mahasiswa
        foreach ($mahasiswaData as $data) {
            // Membuat user
            // Mengambil dua kata pertama dari nama lengkap
            $nameParts = explode(' ', $data['nama_lengkap']);
            $emailName = strtolower($nameParts[0] . (isset($nameParts[1]) ? $nameParts[1] : ''));
            $email = $emailName . '@students.com';
            
            $user = User::create([
                'name' => $data['nama_lengkap'],
                'email' => $email,
                'password' => $data['password'],
            ]);

            $userRole = UserRole::create([
                'user_id' => $user->id,
                'role_id' => 1,
            ]);

            // Membuat mahasiswa dan menghubungkannya dengan user dan program studi
            Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => $data['nim'],
                'nama_lengkap' => $data['nama_lengkap'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'alamat' => $data['alamat'],
                'no_hp' => $data['no_hp'],
                'semester' => $data['semester'],
                'angkatan' => $data['angkatan'],
                'ipk' => $data['ipk'],
                'ips' => $data['ips'],
                'sks' => $data['sks'],
                'total_sks' => $data['total_sks'],
                'status' => $data['status'],
                'jurusan' => $data['program_studi_id'],
                'fakultas_id' => $data['fakultas_id'],
                'dos_wal_id' => $data['dos_wal_id'],
            ]);
        }
    }
}
