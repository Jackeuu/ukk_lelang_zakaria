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
    if(Auth::check()){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('login_masyarakat', [AuthController::class, 'ShowLoginMasyarakat'])->name('login_masyarakat');
Route::post('/login/proses', [AuthController::class, 'login']);
Route::post('/login/proses', [AuthController::class, 'LoginMasyarakat']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('register_masyarakat', [AuthController::class, 'ShowRegisterMasyarakat'])->name('register_masyarakat');
Route::post('register', [AuthController::class, 'register']);
Route::post('register_masyarakat', [AuthController::class, 'RegisterMasyarakat'])->name('daftar');

Route::get('/dashboard', [DashboardController::class, 'DashboardPetugas']);
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/masyarakat', [MasyarakatController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);

Route::middleware('auth.petugas')->group(function (){

});