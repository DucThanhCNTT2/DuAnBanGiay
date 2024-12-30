@extends('_layouts.admins._master')
@section('title','Danh sách loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Danh sách loại sản phẩm</h1>
                    <a href="{{route('ndtadmins.ndtloaisanpham.ndtcreate')}}" class="btn btn-success">Thêm mới</a>
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
                    @forelse ($ndtLoaiSanPham as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$item->ndtMaLoai}}</td>
                            <td>{{$item->ndtTenLoai}}</td>
                            <td>{{$item->ndtTrangThai}}</td>
                            <td>
                                view / <a href="/ndt-admins/ndt-loai-san-pham/ndt-edit/{{$item->id}}">Edit</a> / <a href="/ndt-admins/ndt-loai-san-pham/ndt-delete/{{$item->id}}" 
                                    onclick="return confirm('Bạn có chắc là xóa không ?')" >Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5">Chưa có thông tin loại sản phẩm</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
           </div>
        </div>
    </div>
@endsection