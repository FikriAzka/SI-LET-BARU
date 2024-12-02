<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'akademik',
                'email' => 'akademik@operator.com',
                'role' => 'akademik',
                'password' => bcrypt('akademik123')
            ],
            [
                'name' => 'mahasiswa',
                'email' => 'mahasiswa@students.com',
                'role' => 'mahasiswa',
                'password' => bcrypt('mahasiswa123')
            ],
            [
                'name' => 'dosen',
                'email' => 'dosen@lecturer.com',
                'role' => 'dosen',
                'password' => bcrypt('dosen123')
            ],
            [
                'name' => 'dekan',
                'email' => 'dekan@lecturer.com',
                'role' => 'dekan',
                'password' => bcrypt('dekan123')
            ],
            [
                'name' => 'kaprodi',
                'email' => 'kaprodi@lecturer.com',
                'role' => 'kaprodi',
                'password' => bcrypt('kaprodi123')
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}