@extends('_layouts.admins._master')
@section('title','Danh sách loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Danh sách loại sản phẩm</h1>
                    <a href="{{route('ndtadmin.ndtloaisanpham.ndtcreate')}}" class="btn btn-success">Thêm mới</a>
                </div>
            </div>
        </div>

        <div class="row">
           <div class="col">
            <table class="table border-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $stt = 0;
                @endphp
                @forelse ($ndtloaisanphams as $item)
                    @php
                        $stt++;
                    @endphp
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $item->ndtMaLoai }}</td>
                        <td>{{ $item->ndtTenLoai }}</td>
                        <td>
                            @if($item->ndtTrangThai == 0)
                                <span class="badge bg-success">Hiển Thị</span>
                            @else
                                <span class="badge bg-danger">Khóa</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Các nút chức năng với icon -->
                            <div class="btn-group" role="group">
                                <!-- Xem chi tiết -->
                                <a href="/ndt-admins/ndt-loai-san-pham/ndt-detail/{{ $item->id }}" class="btn btn-success btn-sm" title="Xem">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <!-- Chỉnh sửa -->
                                <a href="/ndt-admins/ndt-loai-san-pham/ndt-edit/{{ $item->id }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Xóa -->
                                <a href="/ndt-admins/ndt-loai-san-pham/ndt-delete/{{ $item->id }}" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn muốn xóa Mã Loại này không? ID: {{ $item->id }}');" title="Xóa">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </td>

                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Chưa có thông tin loại sản phẩm
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
           </div>
        </div>
    </div>
@endsection
