<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Akademik;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $AkademikData = [
            [
                'password' => bcrypt('123'),
                'nip' => '1234567890',
                'nama_lengkap' => 'Budi Ganteng',
                'jenis_kelamin' => 'L',
                'fakultas_id' => 1,
            ],
        ];

        foreach ($AkademikData as $data) {
            // Membuat user untuk dosen
            // Mengambil dua kata pertama dari nama lengkap
            $nameParts = explode(' ', $data['nama_lengkap']);
            $emailName = strtolower($nameParts[0] . (isset($nameParts[1]) ? $nameParts[1] : ''));
            $email = $emailName . '@staff.com';

            $user = User::create([
                'name' => $data['nama_lengkap'],
                'email' => $email,
                'password' => $data['password'],
            ]);
            
            // Menambahkan rolee yang sudah ada berdasarkan rolee_id

            // Membuat role untuk user
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 2, 
            ]);

            // Membuat dosen dan menghubungkannya dengan user
            Akademik::create([
                'user_id' => $user->id,
                'nip' => $data['nip'],
                'nama_lengkap' => $data['nama_lengkap'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'fakultas_id' => $data['fakultas_id'],
            ]);
        }
    }
}
