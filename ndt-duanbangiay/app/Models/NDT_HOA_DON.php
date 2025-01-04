<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NDT_HOA_DON extends Model
{
    use HasFactory;

    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'NDT_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'ndtMaHD',  // Thêm trường ndtMaHD vào mảng fillable
        'ndtMaKH',
        'ndtNgayHD',
        'ndtHoTenKH',
        'ndtEmail',
        'ndtDienThoai',
        'ndtDiaChi',
        'ndtTongTriGia',
        'ndtTrangThai',
    ];

    // Quan hệ với bảng NDT_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(NDT_KHACH_HANG::class, 'ndtMaKH', 'id');
    }

    // Quan hệ với bảng NDT_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(NDT_CT_HOA_DON::class, 'ndtHoaDonID', 'id');
    }
}
