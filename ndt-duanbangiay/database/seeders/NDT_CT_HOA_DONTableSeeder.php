<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NDT_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('NDT_CT_HOA_DON')->insert([
            'ndtHoaDonID'=>1,
            'ndtSanPhamID'=>1,
            'ndtSLMua'=>12,
            'ndtDonGiaMua'=>699000,
            'ndtThanhTien'=>699000 * 12,
            'ndtTrangThai'=>0,
        ]);

        DB::table('NDT_CT_HOA_DON')->insert([
            'ndtHoaDonID'=>2,
            'ndtSanPhamID'=>2,
            'ndtSLMua'=>20,
            'ndtDonGiaMua'=>550000,
            'ndtThanhTien'=>550000 * 20,
            'ndtTrangThai'=>0,
        ]);

        DB::table('NDT_CT_HOA_DON')->insert([
            'ndtHoaDonID'=>3,
            'ndtSanPhamID'=>5,
            'ndtSLMua'=>5,
            'ndtDonGiaMua'=>590000,
            'ndtThanhTien'=>590000 *  5,
            'ndtTrangThai'=>0,
        ]);

        DB::table('NDT_CT_HOA_DON')->insert([
            'ndtHoaDonID'=>4,
            'ndtSanPhamID'=>8,
            'ndtSLMua'=>3,
            'ndtDonGiaMua'=>199000,
            'ndtThanhTien'=>199000 * 3,
            'ndtTrangThai'=>0,
        ]);
    }
}
