<?php

namespace App\Http\Controllers;

use App\Models\NDT_KHACH_HANG;
use App\Models\NDT_SAN_PHAM;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NDT_DANH_SACH_QUAN_TRIController extends Controller
{
    // Danh mục
    public function danhmuc()
    {
        // Truy vấn số lượng sản phẩm
        $productCount = NDT_SAN_PHAM::count();

        // Truy vấn số lượng người dùng
        $userCount = NDT_KHACH_HANG::count();


        // Trả về view và truyền cả productCount và userCount
        return view('ndtAdmins.ndtdanhsachquantri.ndtdanhmuc', compact('productCount', 'userCount'));
    }

    public function nguoidung()
    {
        $ndtnguoidung = ndt_KHACH_HANG::all();

        // Chuyển đổi ndtNgayDK thành đối tượng Carbon thủ công
        foreach ($ndtnguoidung as $user) {
            // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
            $user->ndtNgayDK = Carbon::parse($user->ndtNgayDK);
        }

        return view('ndtAdmins.ndtdanhsachquantri.ndtdanhmuc.ndtnguoidung', ['ndtnguoidung' => $ndtnguoidung]);
    }

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $ndtsanphams = NDT_SAN_PHAM::all(); // Lấy tất cả sản phẩm
        return view('ndtAdmins.ndtdanhsachquantri.ndtdanhmuc.ndtsanpham', ['ndtsanphams' => $ndtsanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = ndt_SAN_PHAM::find($id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('ndtAdmins.ndtdanhsachquantri.ndtdanhmuc.ndtsanpham')
                            ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('ndtAdmins.ndtdanhsachquantri.ndtdanhmuc.ndtmota', ['product' => $product]);
    }
}
