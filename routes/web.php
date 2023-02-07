<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OfficersController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'],function(){

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
            Route::get('detail-pegawai/{officer:officer_id}', [OfficersController::class, 'show'])->name('detailPegawai');
            Route::get('edit-pegawai/{officer:officer_id}', [OfficersController::class, 'edit'])->name('editPegawai');
            Route::post('ubah-pegawai/{officer:officer_id}', [OfficersController::class, 'update'])->name('ubahPegawai');
            Route::post('ubah-sandi-pegawai/{officer:officer_id}', [OfficersController::class, 'updatePassword'])->name('ubahSandiPegawai');
            Route::get('hapus-pegawai/{officer:officer_id}', [OfficersController::class, 'destroy'])->name('hapusPegawai');
        });

        Route::prefix('Kategori')->group(function(){
            Route::get('list-kategori', [CategoriesController::class, 'index'])->name('listKategori');
            Route::get('tambah-kategori', [CategoriesController::class, 'create'])->name('tambahKategori');
            Route::post('simpan-kategori', [CategoriesController::class, 'store'])->name('simpanKategori');
            Route::get('edit-kategori/{category:category_id}', [CategoriesController::class, 'edit'])->name('editKategori');
            Route::post('ubah-kategori/{category:category_id}', [CategoriesController::class, 'update'])->name('ubahKategori');
        });


    });

});
