<?php

use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\Masyarakat\BerkasController;
use App\Http\Controllers\Masyarakat\DashboardController;
use App\Http\Controllers\Masyarakat\LaporanController;
use App\Http\Controllers\Masyarakat\NotifikasiController;
use App\Http\Controllers\Masyarakat\ProfileController;
use App\Http\Controllers\Masyarakat\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
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
    return view('layouts.beranda');
});

Route::get('profile', function () {
    return view('profile');
})->name('profile');

Route::resource('myprofile', ProfileController::class);
Auth::routes();

Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/beranda', function () {
        return view('menu.masyarakat.dashboard');
    });
    Route::resource('dashboard', DashboardController::class);
    Route::resource('pemberitahuan', NotifikasiController::class);
    Route::resource('user', UserController::class);
    Route::resource('list-user', UserController::class);
    Route::get('berkas-create/{id}', [BerkasController::class, 'buat'])->name('buat');
    Route::resource('berkas', BerkasController::class);
    Route::get('rinci-keuangan', [KeuanganController::class, 'indexUser'])->name('rinci-uang');
    Route::get('/laporan', [LaporanController::class, 'indexLap'])->name('laporan-masyarakat');
    Route::resource('keuangan', KeuanganController::class);
});
Route::resource('daftar-laporan', LaporanController::class);

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::post('deadline', [UserController::class, 'updateDeadline'])->name('deadline');
    Route::get('rinci-user/{id}', [KeuanganController::class, 'showUser'])->name('rinci-user');
    Route::get('lapor-user/{id}', [LaporanController::class, 'showLapor'])->name('lapor-user');
    Route::get('dashboard-admin', [DashboardController::class, 'indexAdmin'])->name('dashboard-admin');
    Route::get('/change-berkas', [BerkasController::class, 'changeStatus'])->name('change-berkas');
    Route::get('ubah-deadline/{id}', [UserController::class, 'ubahDeadline'])->name('ubah-deadline');
    Route::get('ubah-status', [LaporanController::class, 'ubahStatus']);
});

Route::get('/t', function () {
    event(new \App\Events\SendMessage());
    dd('event run');
});
