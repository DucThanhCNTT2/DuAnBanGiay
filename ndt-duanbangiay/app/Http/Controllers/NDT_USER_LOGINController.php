<?php

namespace App\Http\Controllers;

use App\Models\NDT_KHACH_HANG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NDT_USER_LOGINController extends Controller
{
    // Show login form
    public function ndtLogin()
    {
        return view('ndtLogin.userlogin');
    }

    // Handle login form submission
    public function ndtLoginSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'ndtEmail' => 'required|email',
            'ndtMatKhau' => 'required|string',
        ]);

        // Tìm người dùng theo email
        $user = NDT_KHACH_HANG::where('ndtEmail', $request->ndtEmail)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->ndtMatKhau, $user->ndtMatKhau)) {
            // Đăng nhập người dùng
            Auth::login($user);

            // Lưu thông tin người dùng vào session
            Session::put('username1', $user->ndtTenKH);  // Lưu tên người dùng
            Session::put('ndtEmail', $user->ndtEmail);  // Lưu email
            Session::put('ndtDienThoai', $user->ndtDienThoai);  // Lưu số điện thoại
            Session::put('ndtDiaChi', $user->ndtDiaChi);  // Lưu địa chỉ
            Session::put('ndtMaKH', $user->ndtMaKH);  // Lưu mã khách hàng

            // Lưu trữ các thông tin cần thiết vào session

            // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
            return redirect()->route('ndtlogin.home1')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Nếu thông tin không chính xác, trả về lỗi
            return redirect()->back()->withErrors(['ndtEmail' => 'Email hoặc Mật khẩu không đúng']);
        }
    }
}
