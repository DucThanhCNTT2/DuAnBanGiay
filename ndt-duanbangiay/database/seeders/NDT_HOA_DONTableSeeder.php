<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NDT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('NDT_HOA_DON')->insert([
            'ndtMaHD'=>'HD001',
            'ndtMaKH'=>1,
            'ndtNgayHD'=>'2024/12/12',
            'ndtHoTenKH'=>'Vũ Tiến Đức',
            'ndtEmail'=>'vuducc@gmail.com',
            'ndtDienThoai'=>'012550036',
            'ndtDiaChi'=>'Yên Bái-Yên Bình',
            'ndtTongTriGia'=>'790000',
            'ndtTrangThai'=>1,
        ]);

        DB::table('NDT_HOA_DON')->insert([
            'ndtMaHD'=>'HD002',
            'ndtMaKH'=>2,
            'ndtNgayHD'=>'2024/12/20',
            'ndtHoTenKH'=>'Trần Tuấn Hưng',
            'ndtEmail'=>'hungtran@gmail.com',
            'ndtDienThoai'=>'012588868',
            'ndtDiaChi'=>'Phú Thọ',
            'ndtTongTriGia'=>'125000',
            'ndtTrangThai'=>0,
        ]);

        DB::table('NDT_HOA_DON')->insert([
            'ndtMaHD'=>'HD003',
            'ndtMaKH'=>3,
            'ndtNgayHD'=>'2024/12/17',
            'ndtHoTenKH'=>'Phan Quang Minh',
            'ndtEmail'=>'pminh@gmail.com',
            'ndtDienThoai'=>'0382550508',
            'ndtDiaChi'=>'Phú Thọ',
            'ndtTongTriGia'=>'999000',
            'ndtTrangThai'=>1,
        ]);

        DB::table('NDT_HOA_DON')->insert([
            'ndtMaHD'=>'HD004',
            'ndtMaKH'=>1,
            'ndtNgayHD'=>'2024/12/12',
            'ndtHoTenKH'=>'Vũ Tiến Đức',
            'ndtEmail'=>'vuducc@gmail.com',
            'ndtDienThoai'=>'012550036',
            'ndtDiaChi'=>'Yên Bái-Yên Bình',
            'ndtTongTriGia'=>'660000',
            'ndtTrangThai'=>1,
        ]);

        DB::table('NDT_HOA_DON')->insert([
            'ndtMaHD'=>'HD005',
            'ndtMaKH'=>4,
            'ndtNgayHD'=>'2024/12/03',
            'ndtHoTenKH'=>'Phạm Tùng Quân',
            'ndtEmail'=>'quanpham@gmail.com',
            'ndtDienThoai'=>'094357152',
            'ndtDiaChi'=>'Hà Nội',
            'ndtTongTriGia'=>'777999',
            'ndtTrangThai'=>1,
        ]);
    }
}
