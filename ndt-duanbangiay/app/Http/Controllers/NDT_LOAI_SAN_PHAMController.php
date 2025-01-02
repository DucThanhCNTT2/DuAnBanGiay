<?php

namespace App\Http\Controllers;

use App\Models\NDT_LOAI_SAN_PHAM;
use Illuminate\Http\Request;

class NDT_LOAI_SAN_PHAMController extends Controller
{
    //admin CRUD
    // list
    public function ndtList()
    {
        $ndtloaisanphams = NDT_LOAI_SAN_PHAM::all();
        return view('ndtAdmins.ndtloaisanpham.ndt-list',['ndtloaisanphams'=>$ndtloaisanphams]);
    }

    //create
    public function ndtCreate()
    {
        return view('ndtAdmins.ndtloaisanpham.ndt-create');
    }

    public function ndtCreateSunmit(Request $request)
    {
        $validatedData = $request->validate([
            'ndtMaLoai' => 'required|unique:ndt_LOAI_SAN_PHAM,ndtMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'ndtTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'ndtTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $ndtloaisanpham = new NDT_LOAI_SAN_PHAM;
        $ndtloaisanpham->ndtMaLoai = $request->ndtMaLoai;
        $ndtloaisanpham->ndtTenLoai = $request->ndtTenLoai;
        $ndtloaisanpham->ndtTrangThai = $request->ndtTrangThai;

        $ndtloaisanpham->save();
       return redirect()->route('ndtadmins.ndtloaisanpham');
    }

    public function ndtEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $ndtloaisanpham = NDT_LOAI_SAN_PHAM::find($id);

        // If the product does not exist, redirect with an error message
        if (!$ndtloaisanpham) {
            return redirect()->route('ndtadmins.ndtloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }

        // Pass the product data to the edit view
        return view('ndtAdmins.ndtloaisanpham.ndt-edit', ['ndtloaisanpham' => $ndtloaisanpham]);
    }

    public function ndtEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'ndtMaLoai' => 'required|string|max:255|unique:ndt_LOAI_SAN_PHAM,ndtMaLoai,' . $request->id,  // Bỏ qua ndtMaLoai của bản ghi hiện tại
            'ndtTenLoai' => 'required|string|max:255',
            'ndtTrangThai' => 'required|in:0,1',  // Validation for ndtTrangThai (0 or 1)
        ]);

        // Find the product by id
        $ndtloaisanpham = NDT_LOAI_SAN_PHAM::find($request->id);

        // Check if the product exists
        if (!$ndtloaisanpham) {
            return redirect()->route('ndtadmins.ndtloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }

        // Update the product with validated data
        $ndtloaisanpham->ndtMaLoai = $request->ndtMaLoai;
        $ndtloaisanpham->ndtTenLoai = $request->ndtTenLoai;
        $ndtloaisanpham->ndtTrangThai = $request->ndtTrangThai;

        // Save the updated product
        $ndtloaisanpham->save();

        // Redirect back to the list page with a success message
        return redirect()->route('ndtadmins.ndtloaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }



    public function ntdGetDetail($id)
    {
        $ndtloaisanpham = NDT_LOAI_SAN_PHAM::where('id', $id)->first();
        return view('ndtAdmins.ndtloaisanpham.ndt-detail',['ndtloaisanpham'=>$ndtloaisanpham]);

    }

    public function ndtDelete($id)
    {
        NDT_LOAI_SAN_PHAM::where('id',$id)->delete();
    return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}
