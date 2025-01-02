<?php

namespace App\Http\Controllers;

use App\Models\NDT_HOA_DON;
use App\Models\NDT_KHACH_HANG;
use App\Models\NDT_SAN_PHAM;
use Illuminate\Http\Request;

class NDT_HOA_DONController extends Controller
{
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = NDT_HOA_DON::findOrFail($hoaDonId);
        $sanPham = NDT_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('ndtlogin.hoadonshow', compact('hoaDon','sanPham'));
    }


      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtList()
    {
        $ndthoadons = ndt_HOA_DON::all();
        return view('ndtAdmins.ndthoadon.ndt-list',['ndthoadons'=>$ndthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ndthoadon = ndt_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ndtAdmins.ndthoadon.ndt-detail', ['ndthoadon' => $ndthoadon]);
    }
    // create
    public function ndtCreate()
    {
        $ndtkhachhang = NDT_KHACH_HANG::all();
        return view('ndtAdmins.ndthoadon.ndt-create',['ndtkhachhang'=>$ndtkhachhang]);
    }
    //post
    public function ndtCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ndtMaHD' => 'required|unique:ndt_hoa_don,ndtMaHD',
            'ndtMaKH' => 'required|exists:ndt_khach_hang,id',
            'ndtNgayHD' => 'required|date',
            'ndtHoTenKH' => 'required|string',
            'ndtEmail' => 'required|email',
            'ndtDienThoai' => 'required|numeric',
            'ndtDiaChi' => 'required|string',
            'ndtTongTriGia' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'ndtTrangThai' => 'required|in:0,1,2',
        ]);

        // Tạo một bản ghi hóa đơn mới
        $ndthoadon = new ndt_HOA_DON;

        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ndthoadon->ndtMaHD = $request->ndtMaHD;
        $ndthoadon->ndtMaKH = $request->ndtMaKH;  // Giả sử đây là khóa ngoại
        $ndthoadon->ndtHoTenKH = $request->ndtHoTenKH;
        $ndthoadon->ndtEmail = $request->ndtEmail;
        $ndthoadon->ndtDienThoai = $request->ndtDienThoai;
        $ndthoadon->ndtDiaChi = $request->ndtDiaChi;

        // Lưu 'vtdTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $ndthoadon->ndtTongTriGia = (double) $request->ndtTongTriGia; // Chuyển đổi sang double

        $ndthoadon->ndtTrangThai = $request->ndtTrangThai;

        // Đảm bảo định dạng đúng cho các trường ngày
        $ndthoadon->ndtNgayHD = $request->ndtNgayHD;

        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ndthoadon->save();

        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ndtadmins.ndthoadon');
    }



    public function ndtEdit($id)
    {
        $ndthoadon = ndt_HOA_DON::where('id', $id)->first();
        $ndtkhachhang = ndt_KHACH_HANG::all();
        return view('ndtAdmins.ndthoadon.ndt-edit',['ndtkhachhang'=>$ndtkhachhang,'ndthoadon'=>$ndthoadon]);
    }
    //post
    public function ndtEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ndtMaHD' => 'required|unique:ndt_hoa_don,ndtMaHD,'. $id,
            'ndtMaKH' => 'required|exists:ndt_khach_hang,id',
            'ndtNgayHD' => 'required|date',
            'ndtHoTenKH' => 'required|string',
            'ndtEmail' => 'required|email',
            'ndtDienThoai' => 'required|numeric',
            'ndtDiaChi' => 'required|string',
            'ndtTongTriGia' => 'required|numeric',
            'ndtTrangThai' => 'required|in:0,1,2',
        ]);

        $ndthoadon = ndt_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ndthoadon->ndtMaHD = $request->ndtMaHD;
        $ndthoadon->ndtMaKH = $request->ndtMaKH;  // Giả sử đây là khóa ngoại
        $ndthoadon->ndtHoTenKH = $request->ndtHoTenKH;
        $ndthoadon->ndtEmail = $request->ndtEmail;
        $ndthoadon->ndtDienThoai = $request->ndtDienThoai;
        $ndthoadon->ndtDiaChi = $request->ndtDiaChi;

        // Lưu 'ndtTongTriGia' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $ndthoadon->ndtTongTriGia = (double) $request->ndtTongTriGia; // Chuyển đổi sang double

        $ndthoadon->ndtTrangThai = $request->ndtTrangThai;

        // Đảm bảo định dạng đúng cho các trường ngày
        $ndthoadon->ndtNgayHD = $request->ndtNgayHD;

        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ndthoadon->save();

        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ndtadmins.ndthoadon');
    }

        //delete
        public function ndtDelete($id)
        {
            ndt_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}
