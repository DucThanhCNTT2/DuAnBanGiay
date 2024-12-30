@extends('_layouts.admins._master')
@section('title','Danh sách sản phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Danh sách sản phẩm</h1>
                    <a href="{{route('ndtadmins.ndtsanpham.ndtcreate')}}" class="btn btn-success">Thêm mới</a>
                </div>
            </div>
        </div>

        <div class="row">
            <table class="table border-bordered">
                <thead>
                    <th>#</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody>
                    @forelse ($ndtSanPhams as $item)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$item->ndtMaSanPham}}</td>
                        <td>{{$item->ndtTenSanPham}}</td>
                        <td> <img src="{{ asset('storage/' . $item->ndtHinhAnh) }}" alt="Hình ảnh" width="50" height="50"></td>
                        <td>{{$item->ndtSoLuong}}</td>
                        <td>{{$item->ndtDonGia}}</td>
                        <td>{{$item->ndtTrangThai}}</td>
                        <td>
                        <a href="/ndt-admins/ndt-san-pham/ndt-edit/{{$item->id}}">Edit</a> / <a href="/ndt-admins/ndt-san-pham/ndt-delete/{{$item->id}}" 
                                onclick="return confirm('Bạn có chắc là xóa không ?')" >Delete</a>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection