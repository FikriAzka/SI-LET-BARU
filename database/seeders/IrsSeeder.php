<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class IrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('irs')->insert([
            [
                'nim' => '24060120120001',
                'jadwal_id' => '1',
                'semester' => '3',
                'prioritas' => '3',
                'status' => 'pending',
                'status_lulus' => 'tidak lulus',
                'nilai'=> '57'
            ],
            [
                'nim' => '24060120120002',
                'jadwal_id' => '1',
                'semester' => '5',
                'prioritas' => '4',
                'status' => 'pending',
                'status_lulus' => 'lulus',
                'nilai'=> '78'
            ],
            
        ]);
    }
}
