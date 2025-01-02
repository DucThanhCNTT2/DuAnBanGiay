@extends('_layouts.admins._master')
@section('title','Create Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('ndtadmin.ndtkhachhang.ndtCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ndtMaKH" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="ndtMaKH" name="ndtMaKH" value="{{ old('ndtMaKH') }}" >
                                @error('ndtMaKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtTenKH" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ndtTenKH" name="ndtTenKH" value="{{ old('ndtTenKH') }}" >
                                @error('ndtTenKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ndtEmail" name="ndtEmail" value="{{ old('ndtEmail') }}" >
                                @error('ndtEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="ndtMatKhau" name="ndtMatKhau" value="{{ old('ndtMatKhau') }}" >
                                @error('ndtMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="ndtDienThoai" name="ndtDienThoai" value="{{ old('ndtDienThoai') }}" >
                                @error('ndtDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="ndtDiaChi" name="ndtDiaChi" value="{{ old('ndtDiaChi') }}" >
                                @error('ndtDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtNgayDK" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="ndtNgayDK" name="ndtNgayDK" value="{{ old('ndtNgayDK') }}" >
                                @error('ndtNgayDK')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" checked/>
                                    <label for="ndtTrangThai1"> Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1"/>
                                    <label for="ndtTrangThai0">Tạm Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai2" name="ndtTrangThai" value="2"/>
                                    <label for="ndtTrangThai0">Khóa</label>
                                </div>
                                @error('ndtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('ndtadmins.ndtkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
