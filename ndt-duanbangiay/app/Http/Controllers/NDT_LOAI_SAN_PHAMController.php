<?php

namespace App\Http\Controllers;

use App\Models\NDT_LOAI_SAN_PHAM;
use Illuminate\Http\Request;

class NDT_LOAI_SAN_PHAMController extends Controller
{
    //admin:crud

    //list
    public function ndtList()
    {
        $ndtLoaiSanPham = NDT_LOAI_SAN_PHAM::all();

        return view('NdtAdmins.ndtLoaiSanPham.ndt-list',['ndtLoaiSanPham'=>$ndtLoaiSanPham]);
    }
    
    //create
    public function ndtCreate()
    {
        return view('NdtAdmins.ndtLoaiSanPham.ndt-create');
    }

    //create--submit
    public function ndtCreateSubmit(Request $request)
    {
        //Validation Data
        $validationData = $request->validate([
            'ndtMaLoai'=>'required|unique:ndt_loai_san_pham',
            'ndtTenLoai'=>'required',
        ]);

        // ghi dữ liệu xuống db

        $ndtLoaiSanPham = new NDT_LOAI_SAN_PHAM;
        $ndtLoaiSanPham->ndtMaLoai = $request->ndtMaLoai;
        $ndtLoaiSanPham->ndtTenLoai = $request->ndtTenLoai;
        $ndtLoaiSanPham->ndtTrangThai = $request->ndtTrangThai;
        
        $ndtLoaiSanPham->save();

        return redirect()->route('ndtadmins.ndtloaisanpham');
    }

    //edit
    public function ndtEdit($id)
    {
        $ndtLoaiSanPham = NDT_LOAI_SAN_PHAM::find($id);
        return view('NdtAdmins.ndtLoaiSanPham.ndt-edit',['ndtLoaiSanPham'=>$ndtLoaiSanPham]);
    }

    //edit submit
    public function ndtEditSubmit(Request $request)
    {
        //Validation Data
        $validationData = $request->validate([
            'ndtMaLoai'=>'required',
            'ndtTenLoai'=>'required',
        ]);

        // ghi dữ liệu xuống db

        $ndtLoaiSanPham = NDT_LOAI_SAN_PHAM::find($request->id);

        $ndtLoaiSanPham->ndtMaLoai = $request->ndtMaLoai;
        $ndtLoaiSanPham->ndtTenLoai = $request->ndtTenLoai;
        $ndtLoaiSanPham->ndtTrangThai = $request->ndtTrangThai;
        
        $ndtLoaiSanPham->save();

        return redirect()->route('ndtadmins.ndtloaisanpham');
    }

    //Delete
    public function ndtDelete($id)
    {
        $ndtLoaiSanPham = NDT_LOAI_SAN_PHAM::find($id);
        $ndtLoaiSanPham->delete();
        return redirect()->route('ndtadmins.ndtloaisanpham');
    }

}
