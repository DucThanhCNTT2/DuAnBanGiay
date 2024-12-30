@extends('_layouts.admins._master')
@section('title','Thêm mới sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
           <div class="col">
                <form action="{{route('ndtadmins.ndtsanpham.ndtcreatesubmit')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm mới sản phẩm</h1>
                        </div>

                        <div class="card-body container-fluid">
                            <div class="mb-3 row">
                                <label for="ndtMaSanPham" class="col-sm-2 col-form-label">Mã sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ndtMaSanPham" name="ndtMaSanPham" value="{{old('ndtMaSanPham')}}" />
                                    @error('ndtMaSanPham')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtTenSanPham" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ndtTenSanPham" name="ndtTenSanPham" value="{{old('ndtTenSanPham')}}" />
                                    @error('ndtTenSanPham')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtHinhAnh" class="col-sm-2 col-form-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="ndtHinhAnh" name="ndtHinhAnh" />
                                    @error('ndtHinhAnh')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtSoLuong" class="col-sm-2 col-form-label">Đơn giá</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="ndtSoLuong" name="ndtSoLuong" value="{{old('ndtSoLuong')}}" />
                                    @error('ndtSoLuong')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtDonGia" class="col-sm-2 col-form-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ndtDonGia" name="ndtDonGia" value="{{old('ndtDonGia')}}" />
                                    @error('ndtDonGia')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtMaLoai" class="col-sm-2 col-form-label">Mã loại</label>
                                <div class="col-sm-10">
                                    <select name="ndtMaLoai" id="ndtMaLoai">
                                        @foreach ($ndtLoaiSanPhams as $item)
                                            <option value="{{$item->ndtMaLoai}}">{{$item->ndtTenLoai}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ndtTrangThai" class="col-sm-2 col-form-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" checked />
                                    <label for="ndtTrangThai1">Hiển thị</label>
                                        &nbsp;
                                    <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" />
                                    <label for="ndtTrangThai0">Khóa</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button class="btn btn-success">Ghi lại</button>
                            <a href="{{route('ndtadmins.ndtsanpham.ndtlist')}}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection