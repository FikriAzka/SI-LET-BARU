<?php

namespace Database\Seeders;

use App\Models\Rolee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nama_role' => 'mahasiswa', 'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'akademik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'doswal',  'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'dekan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'kaprodi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
