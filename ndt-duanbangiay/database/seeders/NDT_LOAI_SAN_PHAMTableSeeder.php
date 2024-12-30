<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NDT_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('NDT_LOAI_SAN_PHAM')->insert([
            'ndtMaLoai'=> "G001",
            'ndtTenLoai'=> "Nike",
            'ndtTrangThai'=> 0
        ]);
        DB::table('NDT_LOAI_SAN_PHAM')->insert([
            'ndtMaLoai'=> "G002",
            'ndtTenLoai'=> "Adidas",
            'ndtTrangThai'=> 0
        ]);
        DB::table('NDT_LOAI_SAN_PHAM')->insert([
            'ndtMaLoai'=> "G003",
            'ndtTenLoai'=> "Puma",
            'ndtTrangThai'=> 0
        ]);
        DB::table('NDT_LOAI_SAN_PHAM')->insert([
            'ndtMaLoai'=> "G004",
            'ndtTenLoai'=> "Asia",
            'ndtTrangThai'=> 0
        ]);
        DB::table('NDT_LOAI_SAN_PHAM')->insert([
            'ndtMaLoai'=> "G005",
            'ndtTenLoai'=> "Asics",
            'ndtTrangThai'=> 0
        ]);
    }
}
