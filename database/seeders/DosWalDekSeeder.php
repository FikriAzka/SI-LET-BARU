<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Dekan;
use App\Models\Dosen;
use App\Models\DosWal;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DosWalDekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Data dosen
        $dosenData = [
            [
                'password' => bcrypt('123'),
                'nip' => '12321',
                'nama_lengkap' => 'Aris Sujarto',
                'jenis_kelamin' => 'L',
                'fakultas_id' => 1,
                
            ],
            [
                'password' => bcrypt('123'),
                'nip' => '1234',
                'nama_lengkap' => 'Mana Amara',
                'jenis_kelamin' => 'P',
                'fakultas_id' => 1,
                
            ],
        ];

        // Membuat dosen dan menghubungkannya dengan user dan role
        foreach ($dosenData as $data) {
            // Membuat user untuk dosen
            // Mengambil dua kata pertama dari nama lengkap
            $nameParts = explode(' ', $data['nama_lengkap']);
            $emailName = strtolower($nameParts[0] . (isset($nameParts[1]) ? $nameParts[1] : ''));
            $email = $emailName . '@lecturer.com';

            $user = User::create([
                'name' => $data['nama_lengkap'],
                'email' => $email,
                'password' => $data['password'],
            ]);
            
            // Menambahkan rolee yang sudah ada berdasarkan rolee_id
            $doswalRole = Role::where('nama_role', 'doswal')->first();
            $dekanRole = Role::where('nama_role', 'dekan')->first();

            // Membuat role untuk user
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $doswalRole->id, 
            ]);
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $dekanRole->id, 
            ]);
            

            // Membuat dosen dan menghubungkannya dengan user
            $dosen = Dosen::create([
                'user_id' => $user->id,
                'nip' => $data['nip'],
                'nama_lengkap' => $data['nama_lengkap'],
                'jenis_kelamin' => $data['jenis_kelamin'],
            ]);

            DosWal::create([
                'dosen_id' => $dosen->id,
                'nama_lengkap' => $data['nama_lengkap'],
            ]);

            Dekan::create([
                'dosen_id' => $dosen->id,
                'fakultas_id' => $data['fakultas_id'],
                
            ]);
        }
    }
}
