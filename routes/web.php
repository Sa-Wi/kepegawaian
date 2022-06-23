<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Models\Calon;
use App\Models\Pegawai;
use Faker\Guesser\Name;
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

//dashboard main
Route::get('/', function () {
    $pegawai = Pegawai::all();
    $rekrutmen = Calon::all();
    $jumlah_pegawai = count($pegawai);
    $jumlah_rekrutmen = count($rekrutmen);
    return view('dashboard.dashboard', [
        'pegawai' => $pegawai,
        'rekrutmen' => $rekrutmen,
        'jumlah_rekrutmen' => $jumlah_rekrutmen,
        'jumlah_pegawai' => $jumlah_pegawai,
    ]);
})->middleware('auth');

//rekrutmen
Route::get('recruitment/new', [CalonController::class, 'create']);
Route::resource('recruitment', CalonController::class)->middleware('auth');

//absensi
Route::resource('attendance', AbsensiController::class)->middleware('auth');
Route::post('/attendance/import', [AbsensiController::class, 'import'])->middleware('auth');

//pegawai
Route::resource('employee', PegawaiController::class)->parameters([
    'employee' => 'pegawai:nip' // untuk mengubah parameter route dan mengambil nip sebagai acuan data
]);
// Route::get('employee/{pegawai:nip}', [PegawaiController::class, 'destroy'])->name('employee.destroy');

//login admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);
