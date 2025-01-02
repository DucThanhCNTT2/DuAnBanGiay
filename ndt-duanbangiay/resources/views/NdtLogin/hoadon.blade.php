@extends('_layouts.frontend.user1')

@section('title', 'Hóa Đơn')

@section('content-body')
<div class="container">
    <h1>Mua Sản Phẩm: {{ $sanPham->ndtTenSanPham }}</h1>

    <form action="{{ route('hoadon.store', ['sanPham' => $sanPham->id]) }}" method="POST">
        @csrf
        <!-- Các trường khách hàng -->
        <div class="mb-3">
            <label for="ndtMaKH" class="form-label">Mã Khách Hàng</label>
            <input type="text" name="ndtMaKH" value="{{ Session::get('ndtMaKH', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ndtHoTenKH" class="form-label">Họ Tên Khách Hàng</label>
            <input type="text" name="ndtHoTenKH" value="{{ Session::get('username1', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ndtEmail" class="form-label">Email</label>
            <input type="email" name="ndtEmail" value="{{ Session::get('ndtEmail', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ndtDienThoai" class="form-label">Số Điện Thoại</label>
            <input type="text" name="ndtDienThoai" value="{{ Session::get('ndtDienThoai', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ndtDiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" name="ndtDiaChi" value="{{ Session::get('ndtDiaChi', '') }}" class="form-control" required>
        </div>

        <!-- Chọn sản phẩm và số lượng -->
        <input type="hidden" name="ndtSanPhamId" value="{{ $sanPham->id }}" required>
        <div class="mb-3">
            <label for="ndtSoLuong" class="form-label">Số Lượng</label>
            <input type="number" name="ndtSoLuong" value="1" min="1" max="{{ $sanPham->ndtSoLuong }}" class="form-control" required>
        </div>

        <!-- Nút Mua -->
        <button type="submit" class="btn btn-primary">Mua Sản Phẩm</button>

    </form>
</div>
@endsection
