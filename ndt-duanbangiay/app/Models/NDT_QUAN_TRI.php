<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NDT_QUAN_TRI extends Model
{
    use HasFactory;

    protected $table="NDT_QUAN_TRI";
     // Chỉ định các cột có thể gán (mass assignable)
     protected $fillable = ['ndtTaiKhoan', 'ndtMatKhau', 'ndtTrangThai'];

     // Tắt timestamp nếu không cần
     public $timestamps = false;
}
