<?php

namespace App\Http\Controllers;

use App\Models\NDT_SAN_PHAM;
use App\Models\NDT_LOAI_SAN_PHAM;
use Illuminate\Http\Request;

class NDT_SAN_PHAMController extends Controller
{
    // CRUD

    //GET: Read all
    public function ndtList()
    {
        $ndtSanPhams = NDT_SAN_PHAM::where('ndtTrangThai',0)->get();
        return view('NdtAdmins.ndtSanPham.ndt-list',['ndtSanPhams'=>$ndtSanPhams]);
    }

    //GET: Create
    public function ndtCreate()
    {
        //Đọc dữ liệu từ bảng ndtLoaiSanPham
        $ndtLoaiSanPhams = NDT_LOAI_SAN_PHAM::all();
        return view('NdtAdmins.ndtSanPham.ndt-create',['ndtLoaiSanPhams'=>$ndtLoaiSanPhams]);
    }

    //POST: CreateSubmit
    public function ndtCreateSubmit()
    {
        //Đọc dữ liệu từ bảng ndtLoaiSanPham
        return redirect()->route('ndtadmins.ndtsanpham.ndtlist');
    }
}
