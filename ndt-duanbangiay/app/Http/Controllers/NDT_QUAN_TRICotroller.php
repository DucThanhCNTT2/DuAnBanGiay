<?php

namespace App\Http\Controllers;

use App\Models\NDT_QUAN_TRI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NDT_QUAN_TRICotroller extends Controller
{
    //

    //GET: login (authentication)
    public function ndtLogin(){
        return view('NdtLogin.ndt-login');
    }

    //POST: login (authentication)
    public function ndtLoginSubmit(Request $request){
         // Validate tài khoản và mật khẩu
         $request->validate([
            'ndtTaiKhoan' => 'required|string',
            'ndtMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng vtd_QUAN_TRI
        $user = NDT_QUAN_TRI::where('ndtTaiKhoan', $request->ndtTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->ndtMatKhau, $user->ndtMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->ndtTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/ndt-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['ndtMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

        public function ndtList()
    {
        $ndtquantris = NDT_QUAN_TRI::all(); // Lấy tất cả quản trị viên
        return view('NdtAdmins.ndtquantri.ndt-list', ['ndtquantris'=>$ndtquantris]);
    }

    public function ndtDetail($id)
        {
            $ndtquantri = NDT_QUAN_TRI::where('id', $id)->first();
            return view('NdtAdmins.ndtquantri.ndt-detail',['ndtquantri'=>$ndtquantri]);

        }

        //create
        // GET: Hiển thị form thêm mới quản trị viên
    public function ndtCreate()
    {
        return view('ndtAdmins.ndtquantri.ndt-create');
    }

    // POST: Xử lý form thêm mới quản trị viên
    public function ndtCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ndtTaiKhoan' => 'required|string|unique:ndt_quan_tri,ndtTaiKhoan',
            'ndtMatKhau' => 'required|string|min:6',
            'ndtTrangThai' => 'required|in:0,1',
        ]);

        // Tạo bản ghi mới trong cơ sở dữ liệu
        $ndtquantri = new NDT_QUAN_TRI();
        $ndtquantri->ndtTaiKhoan = $request->ndtTaiKhoan;
        $ndtquantri->ndtMatKhau = Hash::make($request->ndtMatKhau); // Mã hóa mật khẩu
        $ndtquantri->ndtTrangThai = $request->ndtTrangThai;
        $ndtquantri->save();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('ndtadmins.ndtquantri')->with('success', 'Thêm quản trị viên thành công');
    }

    // edit
    // GET: Hiển thị form chỉnh sửa quản trị viên
    public function ndtEdit($id)
    {
        $ndtquantri = NDT_QUAN_TRI::find($id); // Lấy thông tin quản trị viên cần chỉnh sửa
        if (!$ndtquantri) {
            return redirect()->route('ndtAdmins.ndtquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        return view('ndtAdmins.ndtquantri.ndt-edit', ['ndtquantri'=>$ndtquantri]);
    }

    // POST: Xử lý form chỉnh sửa quản trị viên
    public function ndtEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ndtTaiKhoan' => 'required|string|unique:ndt_quan_tri,ndtTaiKhoan,' . $id,
            'ndtMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
            'ndtTrangThai' => 'required|in:0,1',
        ]);

        // Lấy quản trị viên cần sửa
        $ndtquantri = NDT_QUAN_TRI::find($id);
        if (!$ndtquantri) {
            return redirect()->route('ndtadmins.ndtquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }

        // Cập nhật thông tin
        $ndtquantri->ndtTaiKhoan = $request->ndtTaiKhoan;
        if ($request->ndtMatKhau) {
            $ndtquantri->ndtMatKhau = Hash::make($request->ndtMatKhau); // Cập nhật mật khẩu nếu có
        }
        $ndtquantri->ndtTrangThai = $request->ndtTrangThai;
        $ndtquantri->save();

        return redirect()->route('ndtadmins.ndtquantri')->with('success', 'Cập nhật quản trị viên thành công');
    }

    // delete
    public function ndtDelete($id)
    {
        $ndtquantri = NDT_QUAN_TRI::find($id); // Tìm quản trị viên cần xóa
        if (!$ndtquantri) {
            return redirect()->route('ndtadmins.ndtquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        $ndtquantri->delete(); // Xóa bản ghi

        return redirect()->route('ndtadmins.ndtquantri')->with('success', 'Xóa quản trị viên thành công');
    }
}

