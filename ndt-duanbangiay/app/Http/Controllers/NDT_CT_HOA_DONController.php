<?php

namespace App\Http\Controllers;

use App\Models\NDT_CT_HOA_DON;
use App\Models\NDT_HOA_DON;
use App\Models\NDT_KHACH_HANG;
use App\Models\NDT_SAN_PHAM;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class NDT_CT_HOA_DONController extends Controller
{
    public function show($sanPhamId)
    {
        $sanPham = NDT_SAN_PHAM::find($sanPhamId);

        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('ndtMaKhachHang');

        // Kiểm tra khách hàng tồn tại trong hệ thống
        $khachHang = NDT_KHACH_HANG::find($userId);

        // Truyền thông tin qua view
        return view('ndtlogin.hoadon', [
            'sanPham' => $sanPham,
            'khachHang' => $khachHang, // Truyền thông tin khách hàng vào view
        ]);
    }






   /**
    * Xử lý khi người dùng nhấn "Mua", tạo hóa đơn tự động.
    */
    public function store(Request $request)
    {
        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('ndtMaKH'); // Lấy ID khách hàng từ session

        // Kiểm tra nếu không có khách hàng trong session
        if (!$userId) {
            return redirect()->route('NdtLogin.ndt-login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }

        // Kiểm tra khách hàng tồn tại trong bảng NDT_KHACH_HANG
        $khachhang = NDT_KHACH_HANG::find($userId);
        if (!$khachhang) {
            return redirect()->route('ndtLogin.ndt-login')->with('error', 'Khách hàng không tồn tại.');
        }

        // Lấy thông tin sản phẩm từ bảng ndt_SAN_PHAM
        $sanPham = NDT_SAN_PHAM::find($request->ndtSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Tạo mã hóa đơn tự động (ndtMaHD)
        $ndtMaHD = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Tạo mã hóa đơn ngẫu nhiên

        // Tạo hóa đơn mới với thông tin lấy từ khách hàng
        $hoaDon = NDT_HOA_DON::create([
            'ndtMaHD' => $ndtMaHD,
            'ndtMaKH' => $khachhang->id,  // Sử dụng ID của khách hàng từ bảng vtd_KHACH_HANG
            'ndtNgayHD' => Carbon::now()->toDateString(),
            'ndtHoTenKH' => $request->ndtHoTenKH,
            'ndtEmail' => $request->ndtEmail,
            'ndtDienThoai' => $request->ndtDienThoai,
            'ndtDiaChi' => $request->ndtDiaChi,
            'ndtTongTriGia' => $sanPham->ndtDonGia * $request->ndtSoLuong, // Tính tổng giá trị
            'ndtTrangThai' => 0, // 0 nghĩa là chưa thanh toán
        ]);

        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }




    // xem cthoadon
    public function create($hoaDonId, $sanPhamId)
    {
        // Lấy thông tin hóa đơn và sản phẩm
        $hoaDon = NDT_HOA_DON::find($hoaDonId);
        $sanPham = NDT_SAN_PHAM::find($sanPhamId);

        // Kiểm tra nếu hóa đơn hoặc sản phẩm không tồn tại
        if (!$hoaDon || !$sanPham) {
            return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
        }
    // Lấy số lượng từ request
    $soLuong = request('ndtSoLuong', 1); // Số lượng mặc định là 1 nếu không có giá trị
        // Truyền dữ liệu vào view
        return view('ndtlogin.cthoadon', [
            'hoaDon' => $hoaDon,
            'sanPham' => $sanPham,
            'soLuong' => $soLuong // Truyền số lượng vào view
        ]);
    }


    public function cthoadonshow($hoaDonId, $sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = NDT_HOA_DON::findOrFail($hoaDonId);

        // Lấy chi tiết hóa đơn từ ID
        $chiTietHoaDon = NDT_CT_HOA_DON::where('ndtHoaDonID', $hoaDonId)
                                        ->where('ndtSanPhamID', $sanPhamId)
                                        ->firstOrFail();

        // Trả về view và truyền dữ liệu
        return view('ndtlogin.cthoadonshow', compact('hoaDon', 'chiTietHoaDon'));
    }





    public function storecthoadon(Request $request)
    {
        // Validate các dữ liệu yêu cầu
        $validated = $request->validate([
            'ndtSanPhamID' => 'required|exists:NDT_SAN_PHAM,id',
            'ndtHoaDonID' => 'required|exists:NDT_HOA_DON,id',
            'ndtSoLuong' => 'required|integer|min:1',
        ]);

        // Lấy thông tin sản phẩm và hóa đơn
        $sanPham = NDT_SAN_PHAM::find($request->ndtSanPhamID);
        $hoaDon = NDT_HOA_DON::find($request->ndtHoaDonID);

        // Kiểm tra xem sản phẩm và hóa đơn có tồn tại không
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }

        // Kiểm tra xem chi tiết hóa đơn đã tồn tại chưa
        $chiTietHoaDon = NDT_CT_HOA_DON::where('ndtHoaDonID', $hoaDon->id)
                                        ->where('ndtSanPhamID', $sanPham->id)
                                        ->first();

        // Nếu chi tiết hóa đơn đã tồn tại, cập nhật số lượng và tính lại thành tiền
        if ($chiTietHoaDon) {
            // Cập nhật số lượng và tính lại tổng thành tiền
            $chiTietHoaDon->ndtSLMua += $request->ndtSoLuong;  // Tăng số lượng
            $chiTietHoaDon->ndtThanhTien = $chiTietHoaDon->ndtSLMua * $sanPham->ndtDonGia; // Tính lại thành tiền
            $chiTietHoaDon->save(); // Lưu cập nhật
        } else {
            // Nếu không tồn tại chi tiết hóa đơn, tạo mới chi tiết hóa đơn
            $ndtThanhTien = $request->ndtSoLuong * $sanPham->ndtDonGia;

            NDT_CT_HOA_DON::create([
                'ndtHoaDonID' => $hoaDon->id, // ID hóa đơn
                'ndtSanPhamID' => $sanPham->id, // ID sản phẩm
                'ndtSLMua' => $request->ndtSoLuong, // Số lượng mua
                'ndtDonGiaMua' => $sanPham->ndtDonGia, // Đơn giá của sản phẩm
                'ndtThanhTien' => $ndtThanhTien, // Tổng thành tiền
                'ndtTrangThai' => 1,  // Trạng thái đơn hàng đã xác nhận
            ]);
        }

        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }








    // thanh toán
    // Hiển thị sản phẩm khi nhấn vào "Mua"
    public function ndtthanhtoan($product_id)
    {
        // Lấy sản phẩm theo ID sử dụng model
        $sanPham = NDT_SAN_PHAM::find($product_id);

        // Kiểm tra nếu không có sản phẩm
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        // Trả về view với thông tin sản phẩm
        return view('ndtlogin.thanhtoan', compact('sanPham'));
    }

    // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
    public function storeThanhtoan(Request $request)
    {
        // Lấy thông tin sản phẩm từ model SanPham
        $sanPham = NDT_SAN_PHAM::find($request->product_id);

        // Kiểm tra nếu không có sản phẩm
        if (!$sanPham) {
            return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
        }

        // Tính tổng tiền thanh toán
        $tongTien = $request->ndtSoLuong * $sanPham->ndtDonGia;

        // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
        // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

        return view('ndtlogin.thanhtoan', [
            'sanPham' => $sanPham,
            'ndtSoLuong' => $request->ndtSoLuong,
            'tongTien' => $tongTien
        ]);
    }

      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtList()
    {
        $ndtcthoadons = NDT_CT_HOA_DON::all();
        return view('NdtAdmins.ndtcthoadon.ndt-list',['ndtcthoadons'=>$ndtcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ndtcthoadon = NDT_CT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ndtAdmins.ndtcthoadon.ndt-detail', ['ndtcthoadon' => $ndtcthoadon]);
    }

    // create-----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtCreate()
    {
        $ndthoadon = NDT_HOA_DON::all();
        $ndtsanpham = NDT_SAN_PHAM::all();
        return view('ndtAdmins.ndtcthoadon.ndt-create',['ndthoadon'=>$ndthoadon,'ndtsanpham'=>$ndtsanpham]);
    }
    //post-----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ndtHoaDonID' => 'required|exists:ndt_hoa_don,id',
            'ndtSanPhamID' => 'required|exists:ndt_san_pham,id',
            'ndtSLgMua' => 'required|numeric',
            'ndtDonGiaMua' => 'required|numeric',
            'ndtThanhTien' => 'required|numeric',
            'ndtTrangThai' => 'required|in:0,1,2',
        ]);

        // Tạo một bản ghi hóa đơn mới
        $ndtcthoadon = new NDT_CT_HOA_DON;

        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ndtcthoadon->ndtHoaDonID = $request->ndtHoaDonID;
        $ndtcthoadon->ndtSanPhamID = $request->ndtSanPhamID;
        $ndtcthoadon->ndtSLMua = $request->ndtSLMua;
        $ndtcthoadon->ndtDonGiaMua = $request->ndtDonGiaMua;
        $ndtcthoadon->ndtThanhTien = $request->ndtThanhTien;
        $ndtcthoadon->ndtTrangThai = $request->ndtTrangThai;



        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ndtcthoadon->save();

        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ndtadmins.ndtcthoadon');
    }

    // edit-----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtEdit($id)
    {
        $ndthoadon = NDT_HOA_DON::all(); // Lấy tất cả các hóa đơn
        $ndtsanpham = NDT_SAN_PHAM::all(); // Lấy tất cả các sản phẩm

        // Lấy chi tiết hóa đơn cần chỉnh sửa
        $ndtcthoadon = NDT_CT_HOA_DON::where('id', $id)->first();

        if (!$ndtcthoadon) {
            // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
            return redirect()->route('ndtadmins.ndtcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
        }

        // Trả về view với dữ liệu
        return view('ndtAdmins.ndtcthoadon.ndt-edit', [
            'ndthoadon' => $ndthoadon,
            'ndtsanpham' => $ndtsanpham,
            'ndtcthoadon' => $ndtcthoadon
        ]);
    }

        //post-----------------------------------------------------------------------------------------------------------------------------------------
        public function ndtEditSubmit(Request $request,$id)
        {
            // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
            $validate = $request->validate([
                'ndtHoaDonID' => 'required|exists:ndt_hoa_don,id',
                'ndtSanPhamID' => 'required|exists:ndt_san_pham,id',
                'ndtSLMua' => 'required|numeric',
                'ndtDonGiaMua' => 'required|numeric',
                'ndtThanhTien' => 'required|numeric',
                'ndtTrangThai' => 'required|in:0,1,2',
            ]);


            // Tạo một bản ghi hóa đơn mới
            $ndtcthoadon = ndt_CT_HOA_DON::where('id', $id)->first();

            // Gán dữ liệu xác thực vào các thuộc tính của mô hình
            $ndtcthoadon->ndtHoaDonID = $request->ndtHoaDonID;
            $ndtcthoadon->ndtSanPhamID = $request->ndtSanPhamID;
            $ndtcthoadon->ndtSLMua = $request->ndtSLMua;
            $ndtcthoadon->ndtDonGiaMua = $request->ndtDonGiaMua;
            $ndtcthoadon->ndtThanhTien = $request->ndtThanhTien;
            $ndtcthoadon->ndtTrangThai = $request->ndtTrangThai;



            // Lưu bản ghi mới vào cơ sở dữ liệu
            $ndtcthoadon->save();

            // Chuyển hướng đến danh sách hóa đơn
            return redirect()->route('ndtadmins.ndtcthoadon');
        }

            //delete
        public function ndtDelete($id)
        {
            ndt_CT_HOA_DON::where('id',$id)->delete();
             return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}
