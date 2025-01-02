<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NDT_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Mã hóa mật khẩu bằng Hash::make()
       $ndtMatKhau = Hash::make('Dthanh03042005'); // Mã hóa mật khẩu

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
