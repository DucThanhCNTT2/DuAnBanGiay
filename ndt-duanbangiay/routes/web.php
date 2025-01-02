<?php

use App\Http\Controllers\NDT_CT_HOA_DONController;
use App\Http\Controllers\NDT_DANG_KYController;
use App\Http\Controllers\NDT_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\NDT_HOA_DONController;
use App\Http\Controllers\NDT_KHACH_HANGController;
use App\Http\Controllers\NDT_QUAN_TRICotroller;
use App\Http\Controllers\NDT_LOAI_SAN_PHAMController;
use App\Http\Controllers\NDT_SAN_PHAMController;
use App\Http\Controllers\NDT_USER_LOGINController;
use App\Http\Controllers\TRANGCHUController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// admins login --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/', [NDT_QUAN_TRICotroller::class, 'ndtLogin'])->name('admins.ndtLogin');
Route::post('/', [NDT_QUAN_TRICotroller::class, 'ndtLoginSubmit'])->name('admins.ndtLoginSubmit');


#admins - route--------------------------------------------------------------------------------------------------------------------------------------
route::get('/ndt-admins',function(){
    return view('ndtAdmins.index');
});
#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ndt-admins/ndtdanhsachquantri/ndtdanhmuc', [NDT_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])->name('ndtAdmins.ndtdanhsachquantri.danhmuc');
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ndt-admins/ndtdanhsachquantri/ndtsanpham', [NDT_DANH_SACH_QUAN_TRIController::class, 'sanpham'])->name('ndtAdmins.ndtdanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ndt-admins/ndtdanhsachquantri/ndtmota/{id}', [NDT_DANH_SACH_QUAN_TRIController::class, 'mota'])->name('ndtAdmins.ndtdanhsachquantri.danhmuc.mota');
#admins - nguoidung--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ndt-admins/ndtdanhsachquantri/ndtnguoidung', [NDT_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])->name('ndtAdmins.ndtdanhsachquantri.nguoidung');

// loai san pham--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ndt-admins/ndt-loai-san-pham',[NDT_LOAI_SAN_PHAMController::class,'ndtList'])->name('ndtadmins.ndtloaisanpham');
//create
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-create',[NDT_LOAI_SAN_PHAMController::class,'ndtCreate'])->name('ndtadmin.ndtloaisanpham.ndtcreate');
Route::post('/ndt-admins/ndt-loai-san-pham/ndt-create',[NDT_LOAI_SAN_PHAMController::class,'ndtCreateSunmit'])->name('ndtadmin.ndtloaisanpham.ndtCreateSunmit');
// edit
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-edit/{id}',[NDT_LOAI_SAN_PHAMController::class,'ndtEdit'])->name('ndtadmin.ndtloaisanpham.ndtEdit');
Route::post('/ndt-admins/ndt-loai-san-pham/ndt-edit',[NDT_LOAI_SAN_PHAMController::class,'ndtEditSubmit'])->name('ndtadmin.ndtloaisanpham.ndtEditSubmit');
// detail
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-detail/{id}',[NDT_LOAI_SAN_PHAMController::class,'ntdGetDetail'])->name('ndtadmin.ndtloaisanpham.ndtGetDetail');
// delete
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-delete/{id}',[NDT_LOAI_SAN_PHAMController::class,'ndtDelete'])->name('ndtadmin.ndtloaisanpham.ndtDelete');

// san pham--------------------------------------------------------------------------------------------------------------------------------------
// search
Route::get('/ndt-admins/ndt-san-pham/search', [NDT_SAN_PHAMController::class, 'searchAdmins'])->name('ndtlogin.searchAdmins');
// list

Route::get('/ndt-admins/ndt-san-pham',[NDT_SAN_PHAMController::class,'ndtList'])->name('ndtadims.ndtsanpham');
//create
Route::get('/ndt-admins/ndt-san-pham/ndt-create',[NDT_SAN_PHAMController::class,'ndtCreate'])->name('ndtadmin.ndtsanpham.ndtcreate');
Route::post('/ndt-admins/ndt-san-pham/ndt-create',[NDT_SAN_PHAMController::class,'ndtCreateSubmit'])->name('ndtadmin.ndtsanpham.ndtCreateSubmit');
//detail
Route::get('/ndt-admins/ndt-san-pham/ndt-detail/{id}', [NDT_SAN_PHAMController::class, 'ndtDetail'])->name('ndtadmin.ndtsanpham.ndtDetail');
// edit
Route::get('/ndt-admins/ndt-san-pham/ndt-edit/{id}', [NDT_SAN_PHAMController::class, 'ndtEdit'])->name('ndtadmin.ndtsanpham.ndtedit');

// Xử lý cập nhật sản phẩm
Route::post('/ndt-admins/ndt-san-pham/ndt-edit/{id}', [NDT_SAN_PHAMController::class, 'ndtEditSubmit'])->name('ndtadmin.ndtsanpham.ndtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ndt-admins/ndt-san-pham/ndt-delete/{id}', [NDT_SAN_PHAMController::class, 'ndtdelete'])->name('ndtadmin.ndtsanpham.ndtdelete');


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ndt-admins/ndt-khach-hang',[NDT_KHACH_HANGController::class,'ndtList'])->name('ndtadmins.ndtkhachhang');
//detail
Route::get('/ndt-admins/ndt-khach-hang/ndt-detail/{id}', [NDT_KHACH_HANGcontroller::class, 'ndtDetail'])->name('ndtadmin.ndtkhachhang.ndtDetail');
//create
Route::get('/ndt-admins/ndt-khach-hang/ndt-create',[NDT_KHACH_HANGcontroller::class,'ndtCreate'])->name('ndtadmin.ndtkhachhang.ndtcreate');
Route::post('/ndt-admins/ndt-khach-hang/ndt-create',[NDT_KHACH_HANGcontroller::class,'ndtCreateSubmit'])->name('ndtadmin.ndtkhachhang.ndtCreateSubmit');
//edit
Route::get('/ndt-admins/ndt-khach-hang/ndt-edit/{id}', [NDT_KHACH_HANGcontroller::class, 'ndtEdit'])->name('ndtadmin.ndtkhachhang.ndtedit');
Route::post('/ndt-admins/ndt-khach-hang/ndt-edit/{id}', [NDT_KHACH_HANGcontroller::class, 'ndtEditSubmit'])->name('ndtadmin.ndtkhachhang.ndtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ndt-admins/ndt-khach-hang/ndt-delete/{id}', [NDT_KHACH_HANGcontroller::class, 'ndtDelete'])->name('ndtadmin.ndtkhachhang.ndtdelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ndt-admins/ndt-hoa-don',[NDT_HOA_DONController::class,'ndtList'])->name('ndtadmins.ndthoadon');
//detail
Route::get('/ndt-admins/ndt-hoa-don/ndt-detail/{id}', [NDT_HOA_DONController::class, 'ndtDetail'])->name('ndtadmin.ndthoadon.ndtDetail');
//create
Route::get('/ndt-admins/ndt-hoa-don/ndt-create',[NDT_HOA_DONController::class,'ndtCreate'])->name('ndtadmin.ndthoadon.ndtcreate');
Route::post('/ndt-admins/ndt-hoa-don/ndt-create',[NDT_HOA_DONController::class,'ndtCreateSubmit'])->name('ndtadmin.ndthoadon.ndtCreateSubmit');
//edit
Route::get('/ndt-admins/ndt-hoa-don/ndt-edit/{id}', [NDT_HOA_DONController::class, 'ndtEdit'])->name('ndtadmin.ndthoadon.ndtedit');
Route::post('/ndt-admins/ndt-hoa-don/ndt-edit/{id}', [NDT_HOA_DONController::class, 'ndtEditSubmit'])->name('ndtadmin.ndthoadon.ndtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ndt-admins/ndt-hoa-don/ndt-delete/{id}', [NDT_HOA_DONController::class, 'ndtDelete'])->name('ndtadmin.ndthoadon.ndtdelete');


// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ndt-admins/ndt-ct-hoa-don',[NDT_CT_HOA_DONController::class,'ndtList'])->name('ndtadmins.ndtcthoadon');
//detail
Route::get('/ndt-admins/ndt-ct-hoa-don/ndt-detail/{id}', [NDT_CT_HOA_DONController::class, 'ndtDetail'])->name('ndtadmin.ndtcthoadon.ndtDetail');
//create
Route::get('/ndt-admins/ndt-ct-hoa-don/ndt-create',[NDT_CT_HOA_DONController::class,'ndtCreate'])->name('ndtadmin.ndtcthoadon.ndtcreate');
Route::post('/ndt-admins/ndt-ct-hoa-don/ndt-create',[NDT_CT_HOA_DONController::class,'ndtCreateSubmit'])->name('ndtadmin.ndtcthoadon.ndtCreateSubmit');
//edit
Route::get('/ndt-admins/ndt-ct-hoa-don/ndt-edit/{id}', [NDT_CT_HOA_DONController::class, 'ndtEdit'])->name('ndtadmin.ndtcthoadon.ndtedit');
Route::post('/ndt-admins/ndt-ct-hoa-don/ndt-edit/{id}', [NDT_CT_HOA_DONController::class, 'ndtEditSubmit'])->name('ndtadmin.ndtcthoadon.ndtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ndt-admins/ndt-ct-hoa-don/ndt-delete/{id}', [NDT_CT_HOA_DONController::class, 'ndtDelete'])->name('ndtadmin.ndtcthoadon.ndtdelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ndt-admins/ndt-quan-tri',[NDT_QUAN_TRICotroller::class,'ndtList'])->name('ndtadmins.ndtquantri');
//detail
Route::get('/ndt-admins/ndt-quan-tri/ndt-detail/{id}', [NDT_QUAN_TRICotroller::class, 'ndtDetail'])->name('ndtadmin.ndtquantri.ndtDetail');
//create
Route::get('/ndt-admins/ndt-quan-tri/ndt-create',[NDT_QUAN_TRICotroller::class,'ndtCreate'])->name('ndtadmin.ndtquantri.ndtcreate');
Route::post('/ndt-admins/ndt-quan-tri/ndt-create',[NDT_QUAN_TRICotroller::class,'ndtCreateSubmit'])->name('ndtadmin.ndtquantri.ndtCreateSubmit');
//edit
Route::get('/ndt-admins/ndt-quan-tri/ndt-edit/{id}', [NDT_QUAN_TRICotroller::class, 'ndtEdit'])->name('ndtadmin.ndtquantri.ndtedit');
Route::post('/ndt-admins/ndt-quan-tri/ndt-edit/{id}', [NDT_QUAN_TRICotroller::class, 'ndtEditSubmit'])->name('ndtadmin.ndtquantri.ndtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ndt-admins/ndt-quan-tri/ndt-delete/{id}', [NDT_QUAN_TRICotroller::class, 'ndtDelete'])->name('ndtadmin.ndtquantri.ndtdelete');

















// User - Routes
Route::get('/ndt-login', [TRANGCHUController::class, 'index'])->name('NdtLogin.home');
Route::get('/ndt-login1', [TRANGCHUController::class, 'index1'])->name('ndtlogin.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/ndt-login/show/{id}', [TRANGCHUController::class, 'show'])->name('ndtlogin.show');
// search
Route::get('/search', [NDT_SAN_PHAMController::class, 'search'])->name('ndtlogin.search');
Route::get('/search1', [NDT_SAN_PHAMController::class, 'search1'])->name('ndtlogin.search1');

Route::get('/ndtlogin/login', [NDT_USER_LOGINController::class, 'ndtLogin'])->name('ndtlogin.login');
Route::post('/ndtlogin/login', [NDT_USER_LOGINController::class, 'ndtLoginSubmit'])->name('ndtlogin.ndtLoginSubmit');
Route::get('/ndtlogin/logout', [NDT_USER_LOGINController::class, 'ndtLogout'])->name('ndtlogin.logout');


// hỗ trợ
route::get('/ndt-login/support',function()
{
    return view('ndtlogin.support');
});

// signup
Route::get('/ndt-login/signup', [NDT_DANG_KYController::class, 'ndtsignup'])->name('ndtlogin.ndtsignup');
Route::post('/ndt-login/signup', [NDT_DANG_KYController::class, 'ndtsignupSubmit'])->name('ndtlogin.ndtsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/ndt-login/thanhtoan/{product_id}', [NDT_CT_HOA_DONController::class, 'ndtthanhtoan'])->name('ndtlogin.ndtthanhtoan');

// Route để xử lý thanh toán
Route::post('/ndt-login/thanhtoan', [NDT_CT_HOA_DONController::class, 'storeThanhtoan'])->name('ndtlogin.storeThanhtoan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [NDT_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [NDT_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [NDT_CT_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [NDT_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [NDT_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [NDT_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng
