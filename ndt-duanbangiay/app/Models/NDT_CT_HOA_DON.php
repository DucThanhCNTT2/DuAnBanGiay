<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NDT_CT_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'NDT_CT_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'ndtHoaDonID',   // Đảm bảo có trường vtdHoaDonID ở đây
        'ndtSanPhamID',
        'ndtSLgMua',
        'ndtDonGiaMua',
        'ndtThanhTien',
        'ndtTrangThai',
    ];

    // Quan hệ giữa bảng vtd_CT_HOA_DON và bảng vtd_SAN_PHAM
    // Quan hệ với bảng vtd_HOA_DON
    public function hoaDon()
    {
        return $this->belongsTo(NDT_HOA_DON::class, 'ndtHoaDonID', 'id');
    }

    // Quan hệ với bảng vtd_SAN_PHAM
    public function sanPham()
    {
        return $this->belongsTo(NDT_SAN_PHAM::class, 'ndtSanPhamID', 'id');
    }

}
