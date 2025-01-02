<?php

namespace App\Http\Controllers;

use App\Models\NDT_SAN_PHAM;
use App\Models\NDT_LOAI_SAN_PHAM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NDT_SAN_PHAMController extends Controller
{
    // In your controller
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');

        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = NDT_SAN_PHAM::where('ndtTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = NDT_SAN_PHAM::paginate(10);
        }

        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm
        return view('ndtlogin.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');

        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = NDT_SAN_PHAM::where('ndtTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = NDT_SAN_PHAM::paginate(10);
        }

        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm
        return view('ndtlogin.search1', compact('products', 'search'));
    }


    // search sap pham admin
    public function searchAdmins(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');

        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = NDT_SAN_PHAM::where('ndtTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = NDT_SAN_PHAM::paginate(10);
        }

        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm
        return view('ndtAdmins.ndtsanpham.ndt-search', compact('products', 'search'));
    }

     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtList()
{


    // Apply pagination and filter by ndtTrangThai
    $ndtsanphams = NDT_SAN_PHAM::where('ndtTrangThai', 0);
                   // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
     $ndtsanphams = NDT_SAN_PHAM::paginate(5);

    // Pass the paginated products to the view
    return view('ndtAdmins.ndtsanpham.ndt-list', ['ndtsanphams' => $ndtsanphams]);
}

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ndtDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ndtsanpham = NDT_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ndtAdmins.ndtsanpham.ndt-detail', ['ndtsanpham' => $ndtsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function ndtCreate()
      {
            // đọc dữ liệu từ NDT_LOAI_SAN_PHAM
            $ndtloaisanpham = NDT_LOAI_SAN_PHAM::all();
          return view('ndtAdmins.ndtsanpham.ndt-create',['ndtloaisanpham'=>$ndtloaisanpham]);
      }


     // Controller
public function ndtCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'ndtMaSanPham' => 'required|unique:ndt_SAN_PHAM,ndtMaSanPham',
        'ndtTenSanPham' => 'required|string|max:255',
        'ndtHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'ndtSoLuong' => 'required|numeric|min:1',
        'ndtDonGia' => 'required|numeric',
        'ndtMaLoai' => 'required|exists:NDT_LOAI_SAN_PHAM,id',
        'ndtTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng ndt_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $ndtsanpham = new NDT_SAN_PHAM;
    $ndtsanpham->ndtMaSanPham = $request->ndtMaSanPham;
    $ndtsanpham->ndtTenSanPham = $request->ndtTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('ndtHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('ndtHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->ndtMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $ndtsanpham->ndtHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $ndtsanpham->ndtSoLuong = $request->ndtSoLuong;
    $ndtsanpham->ndtDonGia = $request->vtdDonGia;
    $ndtsanpham->ndtMaLoai = $request->ndtMaLoai;
    $ndtsanpham->ndtTrangThai = $request->ndtTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $ndtsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('ndtadims.ndtsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function ndtdelete($id)
{
    ndt_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function ndtEdit($id)
    {
       // Tìm sản phẩm theo ID
    $ndtsanpham = NDT_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng ndt_LOAI_SAN_PHAM
    $ndtloaisanpham = ndt_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('ndtAdmins.ndtsanpham.ndt-edit', [
        'ndtsanpham' => $ndtsanpham,
        'ndtloaisanpham' => $ndtloaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function ndtEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'ndtMaSanPham' => 'required|max:20',
        'ndtTenSanPham' => 'required|max:255',
        'ndtHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ndtSoLuong' => 'required|integer',
        'ndtDonGia' => 'required|numeric',
        'ndtMaLoai' => 'required|max:10',
        'ndtTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $ndtsanpham = ndt_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $ndtsanpham->ndtMaSanPham = $request->ndtMaSanPham;
    $ndtsanpham->ndtTenSanPham = $request->ndtTenSanPham;
    $ndtsanpham->ndtSoLuong = $request->ndtSoLuong;
    $ndtsanpham->ndtDonGia = $request->ndtDonGia;
    $ndtsanpham->ndtMaLoai = $request->ndtMaLoai;
    $ndtsanpham->ndtTrangThai = $request->ndtTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('ndtHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($ndtsanpham->ndtHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $ndtsanpham->ndtHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $ndtsanpham->ndtHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('ndtHinhAnh')->store('img/san_pham', 'public');
        $ndtsanpham->ndtHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $ndtsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('ndtadims.ndtsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}
}
