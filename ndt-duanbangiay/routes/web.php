<?php

use App\Http\Controllers\NDT_QUAN_TRICotroller;
use App\Http\Controllers\NDT_LOAI_SAN_PHAMController;
use App\Http\Controllers\NDT_SAN_PHAMController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admins/ndt-login',[NDT_QUAN_TRICotroller::class,'ndtLogin'])->name('admins.ndtLogin');
Route::post('/admins/ndt-login',[NDT_QUAN_TRICotroller::class,'ndtLoginSubmit'])->name('admins.ndtLoginSubmit');

#Admins - Route
Route::get('/ndt-admins',function(){
    return view('NdtAdmins.index');
});

Route::get('/ndt-admins/ndt-loai-san-pham',[NDT_LOAI_SAN_PHAMController::class,'ndtList'])->name('ndtadmins.ndtloaisanpham');
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-create',[NDT_LOAI_SAN_PHAMController::class,'ndtCreate'])->name('ndtadmins.ndtloaisanpham.ndtcreate');
Route::post('/ndt-admins/ndt-loai-san-pham/ndt-create',[NDT_LOAI_SAN_PHAMController::class,'ndtCreateSubmit'])->name('ndtadmins.ndtloaisanpham.ndtcreatesubmit');

#edit
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-edit/{id}',[NDT_LOAI_SAN_PHAMController::class,'ndtEdit'])->name('ndtadmins.ndtloaisanpham.ndtedit');
Route::post('/ndt-admins/ndt-loai-san-pham/ndt-edit',[NDT_LOAI_SAN_PHAMController::class,'ndtEditSubmit'])->name('ndtadmins.ndtloaisanpham.ndteditsubmit');

#delete
Route::get('/ndt-admins/ndt-loai-san-pham/ndt-delete/{id}',[NDT_LOAI_SAN_PHAMController::class,'ndtDelete'])->name('ndtadmins.ndtloaisanpham.ndtdelete');

#View
Route::get('/ndt-admins/ndt-san-pham',[NDT_SAN_PHAMController::class,'ndtList'])->name('ndtadmins.ndtsanpham.ndtlist');

Route::get('/ndt-admins/ndt-san-pham/ndt-create',[NDT_SAN_PHAMController::class,'ndtCreate'])->name('ndtadmins.ndtsanpham.ndtcreate');
Route::post('/ndt-admins/ndt-san-pham/ndt-create',[NDT_SAN_PHAMController::class,'ndtCreateSubmit'])->name('ndtadmins.ndtsanpham.ndtcreatesubmit');