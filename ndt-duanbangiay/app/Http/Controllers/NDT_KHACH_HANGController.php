<?php

namespace App\Http\Controllers;

use App\Models\NDT_KHACH_HANG;
use Illuminate\Http\Request;

class NDT_KHACH_HANGController extends Controller
{
    //
    // CRUD
    // list
    public function ndtList()
    {
        $khachhangs = NDT_KHACH_HANG::all();
        return view('ndtAdmins.ndtkhachhang.ndt-list',['khachhangs'=>$khachhangs]);
    }
    // detail
    public function ndtDetail($id)
    {
        $ndtkhachhang = ndt_KHACH_HANG::where('id',$id)->first();
        return view('ndtAdmins.ndtkhachhang.ndt-detail',['ndtkhachhang'=>$ndtkhachhang]);
    }
    // create
    public function ndtCreate()
    {
        return view('ndtAdmins.ndtkhachhang.ndt-create');
    }
    //post
    public function ndtCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'ndtMaKH' => 'required|unique:ndt_khach_hang,ndtTenKH',
            'ndtTenKH' => 'required|string',
            'ndtEmail' => 'required|email|unique:ndt_khach_hang,ndtEmail',
            'ndtMatKhau' => 'required|min:6',
            'ndtDienThoai' => 'required|numeric|unique:ndt_khach_hang,ndtDienThoai',
            'ndtDiaChi' => 'required|string',
            'ndtNgayDK' => 'required|date',
            'ndtTrangThai' => 'required|in:0,1,2',
        ]);

        $ndtkhachhang = new ndt_KHACH_HANG;
        $ndtkhachhang->ndtMaKH = $request->ndtMaKH;
        $ndtkhachhang->ndtTenKH = $request->ndtTenKH;
        $ndtkhachhang->ndtEmail = $request->ndtEmail;
        $ndtkhachhang->ndtMatKhau = $request->ndtMatKhau;
        $ndtkhachhang->ndtDienThoai = $request->ndtDienThoai;
        $ndtkhachhang->ndtDiaChi = $request->ndtDiaChi;
        $ndtkhachhang->ndtNgayDK = $request->ndtNgayDK;
        $ndtkhachhang->ndtTrangThai = $request->ndtTrangThai;

        $ndtkhachhang->save();

        return redirect()->route('ndtadmins.ndtkhachhang');


    }

    // edit
    public function ndtEdit($id)
    {
        // Lấy khách hàng theo id
        $ndtkhachhang = ndt_KHACH_HANG::where('id', $id)->first();

        // Kiểm tra nếu khách hàng không tồn tại
        if (!$ndtkhachhang) {
            return redirect()->route('ndtadmins.ndtkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }

        // Trả về view để chỉnh sửa khách hàng
        return view('ndtAdmins.ndtkhachhang.ndt-edit', ['ndtkhachhang' => $ndtkhachhang]);
    }

    public function ndtEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'ndtMaKH' => 'required|unique:ndt_khach_hang,ndtMaKH,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'ndtTenKH' => 'required|string',
            'ndtEmail' => 'required|email|unique:ndt_khach_hang,ndtEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'ndtMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'ndtDienThoai' => 'required|numeric|unique:ndt_khach_hang,ndtDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'ndtDiaChi' => 'required|string',
            'ndtNgayDK' => 'required|date',
            'ndtTrangThai' => 'required|in:0,1,2',
        ]);

        // Lấy khách hàng theo id
        $ndtkhachhang = ndt_KHACH_HANG::where('id', $id)->first();

        // Kiểm tra nếu khách hàng không tồn tại
        if (!$ndtkhachhang) {
            return redirect()->route('ndtadmins.ndtkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }

        // Cập nhật các giá trị từ request
        $ndtkhachhang->ndtMaKH = $request->ndtMaKH;
        $ndtkhachhang->ndtTenKH = $request->ndtTenKH;
        $ndtkhachhang->ndtEmail = $request->ndtEmail;
        $ndtkhachhang->ndtMatKhau = $request->ndtMatKhau;
        $ndtkhachhang->ndtDienThoai = $request->ndtDienThoai;
        $ndtkhachhang->ndtDiaChi = $request->ndtDiaChi;
        $ndtkhachhang->ndtNgayDK = $request->ndtNgayDK;
        $ndtkhachhang->ndtTrangThai = $request->ndtTrangThai;

        // Lưu khách hàng đã cập nhật
        $ndtkhachhang->save();

        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('ndtadmins.ndtkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }

    //delete
    public function ndtDelete($id)
    {
        ndt_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }
}
