<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class NDT_KHACH_HANG extends Authenticatable
{
    use HasFactory;

    protected $table = 'NDT_KHACH_HANG';
    protected $primaryKey = 'ndtMaKH'; // Đảm bảo rằng ndtMaKH là khóa chính

    protected $fillable = [
        'ndtMaKH', 'ndtTenKH', 'ndtEmail', 'ndtMatKhau',
        'ndtDienThoai', 'ndtDiaChi', 'ndtNgayDK', 'ndtTrangThai'
    ];

    public $incrementing = false; // Nếu ndtMaKH không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['ndtNgayDK'];

    public function setNdtMatKhauAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['ndtMatKhau'] = Hash::make($value);
        }
    }
}
