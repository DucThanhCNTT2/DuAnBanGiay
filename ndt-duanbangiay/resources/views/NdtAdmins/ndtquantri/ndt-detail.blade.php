@extends('_layouts.admins._master')
@section('title','Xem THông Tin Quản Trị Viên')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Quản Trị Viên</h1>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <b>Tài Khoản:</b>
                                {{$ndtquantri->ndtTaiKhoan}}
                            </p>
                            <p class="card-text">
                                <b>Mật Khẩu:</b>
                                {{$ndtquantri->ndtMatKhau}}
                            </p>
                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$ndtquantri->ndtTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('ndtadmins.ndtquantri')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
