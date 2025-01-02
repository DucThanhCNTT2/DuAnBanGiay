@extends('_layouts.admins._master')
@section('title','Xem THông Tin Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <b>Mã Hóa Đơn:</b>
                                {{$ndthoadon->ndtMaHD}}
                            </p>

                            <p class="card-text">
                                <b>Mã Khách Hàng:</b>
                                {{$ndthoadon->ndtMaKH}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Hóa Đơn:</b>
                                {{$ndthoadon->ndtNgayHD}}
                            </p>

                            <p class="card-text">
                                <b>Họ Tên Khách Hàng:</b>
                                {{$ndthoadon->ndtHoTenKH}}
                            </p>
                            <p class="card-text">
                                <b>Email:</b>
                                {{$ndthoadon->ndtEmail}}
                            </p>


                            <p class="card-text">
                                <b>Điện Thoại:</b>
                                {{$ndthoadon->ndtDienThoai}}
                            </p>

                            <p class="card-text">
                                <b>Địa Chỉ:</b>
                                {{$ndthoadon->ndtDiaChi}}
                            </p>

                            <p class="card-text">
                                <b>Tổng Giá Trị:</b>
                                {{ number_format($ndthoadon->ndtTongTriGia, 0, ',', '.') }} VND
                            </p>

                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$ndthoadon->ndtTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('ndtadmins.ndthoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
