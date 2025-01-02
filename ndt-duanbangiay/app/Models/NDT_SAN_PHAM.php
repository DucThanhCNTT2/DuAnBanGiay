<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NDT_SAN_PHAM extends Model
{
    use HasFactory;

    protected $table="NDT_SAN_PHAM";
    protected $primaryKey = 'id';
    public $timestamps = true;


    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'ndtMaSanPham',
        'ndtTenSanPham',
        'ndtHinhAnh',
        'ndtSoLuong',
        'ndtDonGia',
        'ndtMaLoai',
        'ndtTrangThai',
    ];
    public function chiTietHoaDon()
    {
        return $this->hasMany(NDT_CT_HOA_DON::class, 'ndtSanPhamID','id');
    }
}
