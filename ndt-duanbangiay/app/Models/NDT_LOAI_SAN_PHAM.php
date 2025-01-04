<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NDT_LOAI_SAN_PHAM extends Model
{
    use HasFactory;

    protected $table="NDT_LOAI_SAN_PHAM";
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu ndtnhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}
