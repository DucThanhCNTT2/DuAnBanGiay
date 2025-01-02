    @extends('_layouts.frontend.user1')  <!-- Hoặc layout của bạn -->

    @section('title', 'Thông Tin Hóa Đơn')

    @section('content-body')
    <div class="container">
        <h1>Thông Tin Hóa Đơn</h1>

        <div class="card">
            <div class="card-header">
                <h3>Hóa Đơn ID: {{ $hoaDon->ndtMaHD }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên Khách Hàng:</strong> {{ $hoaDon->ndtHoTenKH }}</p>
                <p><strong>Email:</strong> {{ $hoaDon->ndtEmail }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $hoaDon->ndtDienThoai }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $hoaDon->ndtDiaChi }}</p>
                <p><strong>Tổng Giá Trị:</strong> {{ number_format($hoaDon->ndtTongTriGia, 0, ',', '.') }} VND</p>
                <p><strong>Ngày Hóa Đơn:</strong> {{ $hoaDon->ndtNgayHD }}</p>
                <p><strong>Trạng Thái:</strong>
                    @if ($hoaDon->ndtTrangThai == 0)
                        Chưa Thanh Toán
                    @elseif ($hoaDon->ndtTrangThai == 1)
                        Đã Thanh Toán
                    @endif
                </p>
            </div>
            <a href="{{ route('cthoadon.create', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]) }}">Xem chi tiết hóa đơn</a>

        </div>
    </div>

    @endsection
