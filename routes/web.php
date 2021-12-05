<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
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

Auth::routes();

Route::get('/home', [AdminController::class ,'index'])->name('home');
Route::get('/kategori',[AdminController::class ,'kategori']);
Route::get('/suplier',[AdminController::class ,'suplier']);
Route::get('/karyawan',[AdminController::class ,'karyawan']);
Route::get('/pelanggan',[AdminController::class ,'pelanggan']);



Route::group(['prefix' => 'data'], function () {
    Route::resource('kategori', KategoriController::class);
    Route::resource('suplier', SuplierController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('pelanggan', PelangganController::class);
});