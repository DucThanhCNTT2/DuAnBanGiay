@extends('_layouts.admins._master')
@section('title','Xem THông Tin Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Khách Hàng</h1>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <b>Mã Khách Hàng:</b>
                                {{$ndtkhachhang->ndtMaKH}}
                            </p>
                            <p class="card-text">
                                <b>Họ Tên Khách Hàng:</b>
                                {{$ndtkhachhang->ndtTenKH}}
                            </p>
                            <p class="card-text">
                                <b>Email:</b>
                                {{$ndtkhachhang->ndtEmail}}
                            </p>

                            <p class="card-text">
                                <b>Mật Khẩu:</b>
                                {{$ndtkhachhang->ndtMatKhau}}
                            </p>

                            <p class="card-text">
                                <b>Điện Thoại:</b>
                                {{$ndtkhachhang->ndtDienThoai}}
                            </p>

                            <p class="card-text">
                                <b>Địa Chỉ:</b>
                                {{$ndtkhachhang->ndtDiaChi}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Đăng Ký:</b>
                                {{$ndtkhachhang->ndtNgayDangKy}}
                            </p>

                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$ndtkhachhang->ndtTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('ndtadmins.ndtkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
