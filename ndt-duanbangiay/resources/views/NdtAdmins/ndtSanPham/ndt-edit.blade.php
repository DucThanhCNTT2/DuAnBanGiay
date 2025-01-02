@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('ndtadmin.ndtsanpham.ndtEditSubmit', $ndtsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="ndtMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="ndtMaSanPham" class="form-control" value="{{ old('ndtMaSanPham', $ndtsanpham->ndtMaSanPham) }}">
                            @error('ndtMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="ndtTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="ndtTenSanPham" class="form-control" value="{{ old('ndtTenSanPham', $ndtsanpham->ndtTenSanPham) }}">
                            @error('ndtTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="ndtHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="ndtHinhAnh" class="form-control">
                            @if($ndtsanpham->ndtHinhAnh)
                                <img src="{{ asset('storage/' . $ndtsanpham->ndtHinhAnh) }}" alt="Sản phẩm {{ $ndtsanpham->ndtMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('ndtHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="ndtSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="ndtSoLuong" class="form-control" value="{{ old('ndtSoLuong', $ndtsanpham->ndtSoLuong) }}">
                            @error('ndtSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="ndtDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="ndtDonGia" class="form-control" value="{{ old('ndtDonGia', $ndtsanpham->ndtDonGia) }}">
                            @error('ndtDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="ndtMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="ndtMaLoai" id="ndtMaLoai" class="form-control">
                                @foreach ($ndtloaisanpham as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('ndtMaLoai', $ndtsanpham->ndtMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->ndtTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ndtMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="ndtTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" {{ old('ndtTrangThai', $ndtsanpham->ndtTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="ndtTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" {{ old('ndtTrangThai', $ndtsanpham->ndtTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="ndtTrangThai0">Hiển Thị</label>
                            </div>
                            @error('ndtTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('ndtadims.ndtsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
