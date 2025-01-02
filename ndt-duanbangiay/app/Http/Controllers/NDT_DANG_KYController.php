<?php

namespace App\Http\Controllers;

use App\Models\NDT_KHACH_HANG;
use Illuminate\Http\Request;

class NDT_DANG_KYController extends Controller
{
    // Show the form to create a new customer
    public function ndtsignup()
    {
        return view('ndtlogin.signup');
    }

    // Handle the form submission and store customer data
    public function ndtsignupSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'ndtTenKH' => 'required|string|max:255',
            'ndtEmail' => 'required|email|unique:ndt_khach_hang,ndtEmail',
            'ndtMatKhau' => 'required|min:6',
            'ndtDienThoai' => 'required|numeric|unique:ndt_khach_hang,ndtDienThoai',
            'ndtDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (ndtMaKH)
        $lastCustomer = NDT_KHACH_HANG::latest('ndtMaKH')->first(); // Get the latest customer to determine the next ID

        // If no customers exist, start with KH001
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->ndtMaKH, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
        } else {
            $newCustomerID = 'KH001'; // First customer will be KH001
        }

        // Create a new customer record
        $ndtkhachhang = new NDT_KHACH_HANG;
        $ndtkhachhang->ndtMaKH = $newCustomerID; // Automatically generated ID
        $ndtkhachhang->ndtTenKH = $request->ndtTenKH;
        $ndtkhachhang->ndtEmail = $request->ndtEmail;
        $ndtkhachhang->ndtMatKhau = $request->ndtMatKhau; // Encrypt the password
        $ndtkhachhang->ndtDienThoai = $request->ndtDienThoai;
        $ndtkhachhang->ndtDiaChi = $request->ndtDiaChi;
        $ndtkhachhang->ndtNgayDangKy = now(); // Set the current timestamp for registration date
        $ndtkhachhang->ndtTrangThai = 0; // Set the default value for ndtTrangThai to 0 (inactive or unverified)

        // Save the new customer data
        try {
            $ndtkhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('ndtlogin.ndt-login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
