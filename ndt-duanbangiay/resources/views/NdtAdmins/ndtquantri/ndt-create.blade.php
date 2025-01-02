@extends('_layouts.admins._master')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('ndtadmin.ndtquantri.ndtCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ndtTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="ndtTaiKhoan" name="ndtTaiKhoan" required>
                @error('ndtTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ndtMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="ndtMatKhau" name="ndtMatKhau" required>
                @error('ndtMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ndtTrangThai">Trạng Thái</label>
                <select name="ndtTrangThai" id="ndtTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection
