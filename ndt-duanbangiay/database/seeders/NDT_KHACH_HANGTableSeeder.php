<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NDT_KHACH_HANGTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('NDT_KHACH_HANG')->insert([
            'ndtMaKH'=>'KH001',
            'ndtTenKH'=>'Vũ Tiến Bịp',
            'ndtEmail'=>'tienbip@gmail.com',
            'ndtMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'ndtDienThoai'=>'012550036',
            'ndtDiaChi'=>'Hà Nội',
            'ndtNgayDK'=>'2024/12/12',
            'ndtTrangThai'=>0,
        ]);

        DB::table('NDT_KHACH_HANG')->insert([
            'ndtMaKH'=>'KH002',
            'ndtTenKH'=>'Trần Duy Hưng',
            'ndtEmail'=>'hungtran@gmail.com',
            'ndtMatKhau'=>Hash::make('hungtd123'), // Mã hóa mật khẩu
            'ndtDienThoai'=>'012588868',
            'ndtDiaChi'=>'Bắc Ninh',
            'ndtNgayDK'=>'2024/12/20',
            'ndtTrangThai'=>0,
        ]);

        DB::table('NDT_KHACH_HANG')->insert([
            'ndtMaKH'=>'KH003',
            'ndtTenKH'=>'Đặng Quang Minh',
            'ndtEmail'=>'dqminh@gmail.com',
            'ndtMatKhau'=>Hash::make('dqminh3366'), // Mã hóa mật khẩu
            'ndtDienThoai'=>'0382550508',
            'ndtDiaChi'=>'Phú Thọ',
            'ndtNgayDK'=>'2024/12/17',
            'ndtTrangThai'=>1,
        ]);

        DB::table('NDT_KHACH_HANG')->insert([
            'ndtMaKH'=>'KH004',
            'ndtTenKH'=>'Nguyễn Văn Quân',
            'ndtEmail'=>'quanvan@gmail.com',
            'ndtMatKhau'=>Hash::make('quanvan98'), // Mã hóa mật khẩu
            'ndtDienThoai'=>'094357152',
            'ndtDiaChi'=>'Hà Nội',
            'ndtNgayDK'=>'2024/12/03',
            'ndtTrangThai'=>0,
        ]);
    }
}
