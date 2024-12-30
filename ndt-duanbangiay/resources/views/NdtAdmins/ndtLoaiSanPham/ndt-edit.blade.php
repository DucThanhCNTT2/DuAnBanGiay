@extends('_layouts.admins._master')
@section('title','Sửa thông tin loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
           <div class="col">
                <form action="{{route('ndtadmins.ndtloaisanpham.ndteditsubmit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$ndtLoaiSanPham->id}}">
                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa thông tin loại sản phẩm</h1>
                        </div>

                        <div class="card-body container-fluid">
                            <div class="mb-3 row">
                                <label for="ndtMaLoai" class="col-sm-2 col-form-label">Mã loại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ndtMaLoai" name="ndtMaLoai" value="{{$ndtLoaiSanPham->ndtMaLoai}}" />
                                    @error('ndtMaLoai')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtTenLoai" class="col-sm-2 col-form-label">Tên loại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ndtTenLoai" name="ndtTenLoai" value="{{$ndtLoaiSanPham->ndtTenLoai}}" />
                                    @error('ndtTenLoai')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtTrangThai" class="col-sm-2 col-form-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    @if ($ndtLoaiSanPham->ndtTrangThai === 1)
                                        <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" checked />
                                        <label for="ndtTrangThai1">Hiển thị</label>
                                            &nbsp;
                                        <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" />
                                        <label for="ndtTrangThai0">Khóa</label>
                                    @else
                                    <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" />
                                    <label for="ndtTrangThai1">Hiển thị</label>
                                        &nbsp;
                                    <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" checked />
                                    <label for="ndtTrangThai0">Khóa</label>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button class="btn btn-success">Ghi lại</button>
                            <a href="{{route('ndtadmins.ndtloaisanpham')}}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection