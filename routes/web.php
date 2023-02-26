<?php

use App\Http\Controllers\AucationHistoryController;
use App\Http\Controllers\AucationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OfficersController;
use App\Http\Controllers\SocietiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Global
Route::get('/', [ClientsController::class, 'index'])->name('home');
Route::get('/detail-barang/{aucation:aucation_id}', [ClientsController::class, 'show'])->name('lelangDetail');
Route::get('/bid-barang/{item:item_id', [ClientsController::class, 'bidItem'])->name('bidItem');
Route::get('/barang-lelang', [ClientsController::class, 'AucationIndex'])->name('barangLelang');
Route::get('/jadwal-lelang', [ClientsController::class, 'AucationDate'])->name('aucationDate');


Route::group(['middleware' => 'isAdmin'], function(){
    Route::get('/login', [AuthController::class, 'UserIndex'])->name('loginIndex');
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('registerIndex');
    Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('loginUser');
    Route::post('/register-proccess', [AuthController::class, 'register'])->name('register'); 
    Route::get('/admin-login', [AuthController::class, 'loginIndex'])->name('login')->middleware('isAdmin');
    Route::post('/admin-login', [AuthController::class, 'Authenticate'])->name('LoginProses');
});

Route::group(['middleware' => 'auth:web'], function(){
    Route::get('/user-logout', [AuthController::class, 'userLogout'])->name('userLogout');
    Route::post('/set-bid/{aucation:aucation_id}', [BidController::class, 'setBid'])->name('setBid');
    Route::get('/riwayat-lelang', [ClientsController::class, 'aucationHistory'])->name('historyLelang');
    Route::get('/profil/{user:user_id}', [ClientsController::class, 'ClientsProfile'])->name('profileClients');
});

Route::group(['middleware' => 'auth:officer'],function(){

    Route::get('/logout', [AuthController::class, 'logout'])->name('adminLogout');

    Route::prefix('Dashboard')->group(function(){
        
        Route::get('/', [DashboardController::class, 'index'])->name('Dashboard');

        Route::prefix('Barang')->group(function (){
            Route::get('list-barang', [ItemsController::class, 'index'])->name('listBarang');
            Route::get('tambah-barang', [ItemsController::class, 'create'])->name('tambahBarang');
            Route::post('simpan-barang', [ItemsController::class, 'store'])->name('simpanBarang');
            Route::get('detail-barang/{item:item_id}', [ItemsController::class, 'show'])->name('detailBarang');
            Route::get('edit-barang/{item:item_id}', [ItemsController::class, 'edit'])->name('editBarang');
            Route::post('ubah-barang/{item:item_id}', [ItemsController::class, 'update'])->name('ubahBarang');
            Route::get('hapus-barang/{item:item_id}', [ItemsController::class, 'destroy'])->name('hapusBarang');
        });

        Route::prefix('Pegawai')->group(function(){
            Route::get('list-pegawai', [OfficersController::class, 'index'])->name('listPegawai');
            Route::get('tambah-pegawai', [OfficersController::class, 'create'])->name('tambahPegawai');
            Route::post('simpan-pegawai', [OfficersController::class, 'store'])->name('simpanPegawai');
            Route::get('detail-pegawai/{officer:officer_id}', [OfficersController::class, 'show'])->name('profilPegawai');
            Route::get('edit-pegawai/{officer:officer_id}', [OfficersController::class, 'edit'])->name('editPegawai');
            Route::post('ubah-pegawai/{officer:officer_id}', [OfficersController::class, 'update'])->name('ubahPegawai');
            Route::post('ubah-sandi-pegawai/{officer:officer_id}', [OfficersController::class, 'updatePassword'])->name('ubahSandiPegawai');
            Route::get('hapus-pegawai/{officer:officer_id}', [OfficersController::class, 'destroy'])->name('hapusPegawai');
        });

        Route::prefix('Masyarakat')->group(function(){
            Route::get('list-masyarakat', [SocietiesController::class, 'index'])->name('listMasyarakat');
            Route::get('tambah-masyarakat', [SocietiesController::class, 'create'])->name('tambahMasyarakat');
            Route::post('simpan-masyarakat', [SocietiesController::class, 'store'])->name('simpanMasyarakat');
            Route::get('edit-masyarakat/{user:user_id}', [SocietiesController::class, 'edit'])->name('editMasyarakat');
            Route::post('ubah-sandi-masyarakat/{user:user_id}', [SocietiesController::class, 'update'])->name('ubahMasyarakat');
            Route::get('hapus-masyarakat/{user:user_id}', [SocietiesController::class, 'destroy'])->name('hapusMasyarakat');
        });

        Route::prefix('Kategori')->group(function(){
            Route::get('list-kategori', [CategoriesController::class, 'index'])->name('listKategori');
            Route::get('tambah-kategori', [CategoriesController::class, 'create'])->name('tambahKategori');
            Route::post('simpan-kategori', [CategoriesController::class, 'store'])->name('simpanKategori');
            Route::get('edit-kategori/{category:category_id}', [CategoriesController::class, 'edit'])->name('editKategori');
            Route::post('ubah-kategori/{category:category_id}', [CategoriesController::class, 'update'])->name('ubahKategori');
            Route::get('hapus-kategori/{category:category_id}', [CategoriesController::class, 'destroy'])->name('hapusKategori');
        });

        Route::prefix('Merek')->group(function(){
            Route::get('list-merek', [BrandsController::class, 'index'])->name('listMerek');
            Route::get('tambah-merek', [BrandsController::class, 'create'])->name('tambahMerek');
            Route::post('simpan-merek', [BrandsController::class, 'store'])->name('simpanMerek');
            Route::get('edit-merek/{brand:brand_id}', [BrandsController::class, 'edit'])->name('editMerek');
            Route::post('ubah-merek/{brand:brand_id}', [BrandsController::class, 'update'])->name('ubahMerek');
            Route::get('hapus-merek/{brand:brand_id}', [BrandsController::class, 'destroy'])->name('hapusMerek');
        });

        Route::prefix('Lelang')->group(function(){
            Route::get('list-lelang', [AucationsController::class, 'index'])->name('listLelang');
            Route::get('detail-lelang/{aucation:aucation_id}', [AucationsController::class, 'show'])->name('detailLelang');
            Route::get('tambah-lelang', [AucationsController::class, 'create'])->name('tambahLelang');
            Route::get('update-status/{aucation:aucation_id}', [AucationsController::class, 'updateStatus'])->name('updateStatus');
            Route::post('simpan-lelang', [AucationsController::class, 'store'])->name('simpanLelang');
            Route::get('edit-lelang/{aucation:aucation_id}', [AucationsController::class, 'edit'])->name('editLelang');
            Route::get('riwayat-lelang', [AucationsController::class, 'lelangIndex'])->name('riwayatLelang');
            Route::post('ubah-lelang/{aucation:aucation_id}', [AucationsController::class, 'update'])->name('ubahLelang');
        });

        Route::prefix('Riwayat-Lelang')->group(function(){
            Route::get('list-riwayat-lelang', [AucationHistoryController::class, 'index'])->name('listRiwayatLelang');
            Route::get('detail-riwayat-lelang/{user:user_id}', [AucationHistoryController::class, 'show'])->name('detailRiwayatLelang');
        });



    });

});
