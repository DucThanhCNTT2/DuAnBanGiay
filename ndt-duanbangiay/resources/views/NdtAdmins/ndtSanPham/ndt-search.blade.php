@extends('_layouts.admins._master')
@section('title', 'Danh Sách Sản Phẩm')

@section('content-body')






<div class="container border mt-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-xl font-semibold">Danh Sách Sản Phẩm</h1>
            <!-- Nút Thêm Mới -->
            <a href="{{ route('ndtadmin.ndtsanpham.ndtcreate') }}" class="btn btn-success btn-lg">
                <i class="fa-solid fa-plus-circle"></i> Thêm Mới
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Mã Loại</th>
                    <th>Trạng Thái</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = 0;
                @endphp
                @forelse ($products as $item)
                    @php
                        $stt++;
                    @endphp
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $item->ndtMaSanPham }}</td>
                        <td>{{ $item->ndtTenSanPham }}</td>
                        <td style="display: flex; justify-content: center; align-items: center; height: 100px;">
                            <img src="{{ asset('storage/' . $item->ndtHinhAnh) }}" alt="Sản phẩm {{ $item->ndtMaSanPham }}" width="100" height="100">
                        </td>
                        <td>{{ $item->ndtSoLuong }}</td>
                        <td>{{ number_format($item->ndtDonGia, 0, ',', '.') }} VND</td>
                        <td>{{ $item->ndtMaLoai }}</td>
                        <td>
                            @if($item->ndtTrangThai == 0)
                                <span class="badge bg-success">Hiển Thị</span>
                            @else
                                <span class="badge bg-danger">Khóa</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <!-- Xem chi tiết -->
                                <a href="{{ route('ndtadmin.ndtsanpham.ndtDetail', $item->id) }}" class="btn btn-success btn-sm" title="Xem">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <!-- Chỉnh sửa -->
                                <a href="{{ route('ndtadmin.ndtsanpham.ndtedit', $item->id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Xóa -->
                                <a href="{{ route('ndtadmin.ndtsanpham.ndtdelete', $item->id) }}" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn muốn xóa Mã sản phẩm này không? ID: {{ $item->id }}');" title="Xóa">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            Chưa có thông tin sản phẩm
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        <a href="{{ route('ndtadims.ndtsanpham') }}">
            <button type="button" class="btn btn-primary">Quay Lại</button>
        </a>
                <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-3">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
