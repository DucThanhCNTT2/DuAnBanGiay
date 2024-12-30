<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NDT_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ndtMatKhau = md5("123456a@");
        DB::table('NDT_QUAN_TRI')->insert([
            'ndtTaiKhoan' => "dthann2005@gmail.com",
            'ndtMatKhau' => $ndtMatKhau, 
            'ndtTrangThai'=>0
        ]);
        DB::table('NDT_QUAN_TRI')->insert([
            'ndtTaiKhoan' => "0367907165",
            'ndtMatKhau' => $ndtMatKhau, 
            'ndtTrangThai'=>0
        ]);
    }
}
