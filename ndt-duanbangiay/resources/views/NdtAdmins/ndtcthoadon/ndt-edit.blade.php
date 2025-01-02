@extends('_layouts.admins._master')
@section('title','Chỉnh Sửa Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('ndtadmin.ndtcthoadon.ndtEditSubmit', $ndtcthoadon->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <h1>Chỉnh Sửa Chi Tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="ndtHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="ndtHoaDonID" id="ndtHoaDonID" class="form-control">
                                @foreach ($ndthoadon as $item)
                                    <option value="{{ $item->id }}" {{ $ndtcthoadon->ndtHoaDonID == $item->id ? 'selected' : '' }}>{{ $item->ndtMaHD }}</option>
                                @endforeach
                            </select>
                            @error('ndtHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ndtSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="ndtSanPhamID" id="ndtSanPhamID" class="form-control">
                                @foreach ($ndthoadon as $item)
                                    <option value="{{ $item->id }}" {{ $ndtcthoadon->ndtSanPhamID == $item->id ? 'selected' : '' }}>{{ $item->ndtMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('ndtSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ndtSLMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="ndtSLMua" name="ndtSLMua" value="{{ old('ndtSLMua', $ndtcthoadon->ndtSLMua) }}" min="1" oninput="calculateThanhTien()">
                            @error('ndtSLMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ndtDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="ndtDonGiaMua" name="ndtDonGiaMua" value="{{ old('ndtDonGiaMua', $ndtcthoadon->ndtDonGiaMua) }}" oninput="calculateThanhTien()">
                            @error('ndtDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ndtThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="ndtThanhTien" name="ndtThanhTien" value="{{ old('ndtThanhTien', $ndtcthoadon->ndtThanhTien) }}" readonly>
                            @error('ndtThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ndtTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="ndtTrangThai0" name="ndtTrangThai" value="0" {{ $ndtcthoadon->ndtTrangThai == 0 ? 'checked' : '' }} />
                                <label for="ndtTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="ndtTrangThai1" name="ndtTrangThai" value="1" {{ $ndtcthoadon->ndtTrangThai == 1 ? 'checked' : '' }} />
                                <label for="ndtTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="ndtTrangThai2" name="ndtTrangThai" value="2" {{ $ndtcthoadon->ndtTrangThai == 2 ? 'checked' : '' }} />
                                <label for="ndtTrangThai2">Xóa</label>
                            </div>
                            @error('ndtTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('ndtadmins.ndtcthoadon') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('vtdSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('vtdDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('vtdThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }
    </script>
@endsection
