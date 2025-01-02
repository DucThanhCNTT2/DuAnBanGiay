@extends('_layouts.admins._master')
@section('title','Sửa Loại Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the ndtMaKhachHang as a parameter -->
                <form action="{{ route('ndtadmin.ndthoadon.ndtEditSubmit', ['id' => $ndthoadon->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $ndthoadon->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="ndtMaHD" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="ndtMaHD" name="ndtMaHD" value="{{ $ndthoadon->ndtMaHD }}" >
                                @error('ndtMaHD')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtMaKH" class="form-label">Khách Hàng</label>
                                <select name="ndtMaKH" id="ndtMaKH" class="form-control">
                                    @foreach ($ndtkhachhang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('ndtMaKH', $ndthoadon->ndtMaKH) == $item->id ? 'selected' : '' }}>
                                            {{ $item->ndtHoTenKH }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ndtMaKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                             <div class="mb-3">
                                <label for="ndtNgayHD" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="ndtNgayHD" name="ndtNgayHD" value="{{ old('ndtNgayHD', $ndthoadon->ndtNgayHD) }}" >
                                @error('ndtNgayHD')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="ndtHoTenKH" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ndtHoTenKH" name="ndtHoTenKH" value="{{ old('ndtHoTenKH', $ndthoadon->ndtHoTenKH) }}" >
                                @error('ndtHoTenKH')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ndtEmail" name="ndtEmail" value="{{ old('ndtEmail', $ndthoadon->ndtEmail) }}" >
                                @error('ndtEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="ndtDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="ndtDienThoai" name="ndtDienThoai" value="{{ old('ndtDienThoai', $ndthoadon->ndtDienThoai) }}" >
                                @error('ndtDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="ndtDiaChi" name="ndtDiaChi" value="{{ old('ndtDiaChi', $ndthoadon->ndtDiaChi) }}" >
                                @error('ndtDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ndtTongTriGia" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="ndtTongTriGia" name="ndtTongTriGia" value="{{ old('ndtTongTriGia', $ndthoadon->ndtTongTriGia) }}" >
                                @error('ndtTongTriGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="ndtTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" {{ old('ndtTrangThai', $ndthoadon->ndtTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="ndtTrangThai0">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" {{ old('ndtTrangThai', $ndthoadon->ndtTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="ndtTrangThai1">Đang Sử Lý</label>

                                    &nbsp;
                                    <input type="radio" id="ndtTrangThai2" name="ndtTrangThai" value="2" {{ old('ndtTrangThai', $ndthoadon->ndtTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="ndtTrangThai0">Đã Hoàn Thành</label>
                                </div>
                                @error('ndtTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to (edit) -->
                            <button class="btn btn-success" type="submit">Sửa</button>
                            <a href="{{ route('ndtadmins.ndthoadon') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
