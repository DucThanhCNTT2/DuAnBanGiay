@extends('_layouts.admins._master')
@section('title','Sửa Loại Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the ndtMaKH as a parameter -->
                <form action="{{ route('ndtadmin.ndtkhachhang.ndtEditSubmit', ['id' => $ndtkhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $ndtkhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="ndtMaKH" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="ndtMaKH" name="ndtMaKH" value="{{ $ndtkhachhang->ndtMaKH }}" >
                                @error('ndtMaKH')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="ndtTenKH" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ndtTenKH" name="ndtTenKH" value="{{ old('ndtTenKH', $ndtkhachhang->ndtTenKH) }}" >
                                @error('ndtTenKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ndtEmail" name="ndtEmail" value="{{ old('ndtEmail', $ndtkhachhang->ndtEmail) }}" >
                                @error('ndtEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="ndtMatKhau" name="ndtMatKhau" value="{{ old('ndtMatKhau', $ndtkhachhang->ndtMatKhau) }}" >
                                @error('ndtMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="ndtDienThoai" name="ndtDienThoai" value="{{ old('ndtDienThoai', $ndtkhachhang->ndtDienThoai) }}" >
                                @error('ndtDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="ndtDiaChi" name="ndtDiaChi" value="{{ old('ndtDiaChi', $ndtkhachhang->ndtDiaChi) }}" >
                                @error('vtdDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtNgayDK" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="ndtNgayDK" name="ndtNgayDK" value="{{ old('ndtNgayDK', $ndtkhachhang->ndtNgayDK) }}" >
                                @error('ndtNgayDK')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="ndtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" {{ old('vtdTrangThai', $ndtkhachhang->ndtTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="ndtTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" {{ old('vtdTrangThai', $ndtkhachhang->ndtTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="ndtTrangThai1">Tạm Khóa</label>

                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai2" name="ndtTrangThai" value="2" {{ old('vtdTrangThai', $ndtkhachhang->ndtTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="ndtTrangThai0">Khóa</label>
                                </div>
                                @error('ndtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('ndtadmins.ndtkhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
