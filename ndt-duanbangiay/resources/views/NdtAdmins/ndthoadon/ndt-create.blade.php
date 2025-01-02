@extends('_layouts.admins._master')
@section('title','Create Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('ndtadmin.ndthoadon.ndtCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ndtMaHDn" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="ndtMaHDn" name="ndtMaHDn" value="{{ old('ndtMaHDn') }}" >
                                @error('ndtMaHDn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtMaKH" class="form-label">Khách Hàng</label>
                                <select name="ndtMaKH" id="ndtMaKH" class="form-control">
                                    @foreach ($ndtkhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->ndtHoTenKH }}</option>
                                    @endforeach
                                </select>
                                @error('ndtMaKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtNgayHD" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="ndtNgayHD" name="ndtNgayHD" value="{{ old('ndtNgayHD') }}" >
                                @error('ndtNgayHD')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtHoTenKH" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ndtHoTenKH" name="ndtHoTenKH" value="{{ old('ndtHoTenKH') }}" >
                                @error('ndtHoTenKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtEmail" class="form-label">Email</label>
                                <input type="Email" class="form-control" id="ndtEmail" name="ndtEmail" value="{{ old('ndtEmail') }}" >
                                @error('ndtEmail')
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
                                <label for="ndtTongTriGia" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="ndtTongTriGia" name="ndtTongTriGia" value="{{ old('ndtTongTriGia') }}" >
                                @error('ndtTongTriGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" checked/>
                                    <label for="ndtTrangThai0">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1"/>
                                    <label for="ndtTrangThai1">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai2" name="ndtTrangThai" value="2"/>
                                    <label for="ndtTrangThai2">Đã hoàn Thành</label>
                                </div>
                                @error('ndtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('ndtadmins.ndthoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
