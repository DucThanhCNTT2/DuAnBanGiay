<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NDT_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "A001",
            'ndtTenSanPham' => "Adidas Samba OG Đế Cao",
            'ndtHinhAnh' => "images/Adidas-Samba-OG-De-Cao.jpg",
            'ndtSoLuong' => 200,
            'ndtDonGia' => 990000,
            'ndtMaLoai' => 1,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "A002",
            'ndtTenSanPham' => "Adidas Superstar",
            'ndtHinhAnh' => "images/Adidas-Superstar.jpg",
            'ndtSoLuong' => 250,
            'ndtDonGia' => 100000,
            'ndtMaLoai' => 1,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "A003",
            'ndtTenSanPham' => "Adidas Yeezy 350",
            'ndtHinhAnh' => "images/Adidas-Yeezy-350.jpg",
            'ndtSoLuong' => 300,
            'ndtDonGia' => 50000,
            'ndtMaLoai' => 1,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "N001",
            'ndtTenSanPham' => "Jordan 1 Retro High OG",
            'ndtHinhAnh' => "images/Giay-Nike-Air-Jordan-1-Retro-High-OG-Lost-Found.jpg",
            'ndtSoLuong' => 2150,
            'ndtDonGia' => 900000,
            'ndtMaLoai' => 2,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "N002",
            'ndtTenSanPham' => "Nike Air Force 1",
            'ndtHinhAnh' => "images/giay-nike-air-force-1.jpg",
            'ndtSoLuong' => 200,
            'ndtDonGia' => 350000,
            'ndtMaLoai' => 2,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "N003",
            'ndtTenSanPham' => "Nike Blazer Mid",
            'ndtHinhAnh' => "images/Nike-Blazer-Mid.jpg",
            'ndtSoLuong' => 100,
            'ndtDonGia' => 250000,
            'ndtMaLoai' => 2,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "P001",
            'ndtTenSanPham' => "Puma Palermo",
            'ndtHinhAnh' => "images/Giay-Puma-Palermo.jpg",
            'ndtSoLuong' => 100,
            'ndtDonGia' => 250000,
            'ndtMaLoai' => 3,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "ASIA",
            'ndtTenSanPham' => "Giày thể thao Asia",
            'ndtHinhAnh' => "images/giay-the-thao-asia.jpg",
            'ndtSoLuong' => 200,
            'ndtDonGia' => 30000,
            'ndtMaLoai' => 4,
            'ndtTrangThai' => 0
        ]);
        DB::table("NDT_SAN_PHAM")->insert([
            'ndtMaSanPham' => "ASICS",
            'ndtTenSanPham' => "Giày thể thao Asics",
            'ndtHinhAnh' => "images/giay-the-thao-asics.jpg",
            'ndtSoLuong' => 400,
            'ndtDonGia' => 30000,
            'ndtMaLoai' => 5,
            'ndtTrangThai' => 0
        ]);
        
    }
}
