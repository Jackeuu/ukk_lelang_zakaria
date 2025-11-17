<?php

use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;

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
    return redirect()->route('login_petugas');
});

Route::get('/logout_masyarakat', [AuthController::class, 'logoutMasyarakat'])->name('logout_masyarakat');
Route::get('/logout_petugas', [AuthController::class, 'logoutPetugas'])->name('logout_petugas');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_petugas');
Route::get('login_masyarakat', [AuthController::class, 'ShowLoginMasyarakat'])->name('login_masyarakat');

Route::post('/login/proses', [AuthController::class, 'login']);
Route::post('/login_masyarakat/proses', [AuthController::class, 'LoginMasyarakat'])->name('login.masyarakat.proses');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('register_masyarakat', [AuthController::class, 'ShowRegisterMasyarakat'])->name('register_masyarakat');
Route::post('register', [AuthController::class, 'register']);
Route::post('register_masyarakat', [AuthController::class, 'RegisterMasyarakat'])->name('daftar');

Route::get('/dashboard', [DashboardController::class, 'DashboardPetugas']);
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/masyarakat', [MasyarakatController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);

Route::post('petugas/store', [PetugasController::class, 'store']);

Route::delete('/petugas/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

Route::post('masyarakat/store', [MasyarakatController::class, 'store']);
Route::put('/masyarakat/update/{id}', [MasyarakatController::class, 'update'])->name('masyarakat.update');
Route::delete('/masyarakat/delete/{id}', [MasyarakatController::class, 'destroy'])->name('masyarakat.destroy');

Route::post('/barang/store', [BarangController::class, 'store']);

Route::delete('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::middleware('auth.petugas')->group(function () {

});

Route::get('/dashboard_masyarakat', function () {
    return view('dashboard_masyarakat');
})->name('dashboard_masyarakat')->middleware('auth.masyarakat');

