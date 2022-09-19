<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PosisiController;
use App\Models\Calon;
use App\Models\Pegawai;
use App\Models\Posisi;
use Carbon\Carbon;
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
    $jumlah_rekrutmen_baru = Calon::whereDate('created_at', Carbon::today()->toDateString())->count();
    $jumlah_posisi = Posisi::all()->count();
    // dd($jumlah_rekrutmen_baru);
    return view('dashboard.dashboard', [
        'pegawai' => $pegawai,
        'rekrutmen' => $rekrutmen,
        'jumlah_rekrutmen' => $jumlah_rekrutmen,
        'jumlah_pegawai' => $jumlah_pegawai,
        'jumlah_rekrutmen_baru' => $jumlah_rekrutmen_baru,
        'jumlah_posisi' => $jumlah_posisi,
        'title' => 'Dashboard',
    ]);
})->middleware('auth');

//rekrutmen
Route::get('recruitment/new', [CalonController::class, 'create']);
Route::get('recruitment/new/success', [CalonController::class, 'review'])->name('recruitment.review');
// Route::resource('recruitment', CalonController::class)->middleware('auth');
Route::post('recruitment/store', [CalonController::class, 'store'])->name('recruitment.store');
Route::resource('recruitment', CalonController::class)->except('store');

//absensi
Route::resource('attendance', AbsensiController::class)->parameters([
    'attendance' => 'absensi:id' // untuk mengubah parameter route dan mengambil id sebagai acuan data
])->middleware('auth');
Route::post('/attendance/import', [AbsensiController::class, 'import'])->middleware('auth');
Route::get('/attendance/add/{pegawai}', [AbsensiController::class, 'add'])->name('attendance.add')->middleware('auth');
Route::get('/attendance/store/{pegawai}', [AbsensiController::class, 'store'])->name('attendance.store')->middleware('auth');
Route::post('/attendance/filtered', [AbsensiController::class, 'dateFilter'])->middleware('auth');

//pegawai
Route::resource('employee', PegawaiController::class)->parameters([
    'employee' => 'pegawai:id' // untuk mengubah parameter route dan mengambil id sebagai acuan data
])->middleware('auth');
Route::get('/employee/{pegawai}/attendance', [PegawaiController::class, 'showAttendance'])->name('employee.attendance');
// Route::get('employee/{pegawai:nip}', [PegawaiController::class, 'destroy'])->name('employee.destroy');
// Route::post('employee/import', [PegawaiController::class, 'import'])->name('employee.import');

//posisi
Route::resource('position', PosisiController::class)->middleware('auth');

//login admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);

//trash data
Route::get('/trash/employee', [PegawaiController::class, 'trash'])->middleware('auth');
Route::get('/trash/attendance', [AbsensiController::class, 'trash'])->middleware('auth');
Route::get('/trash/recruitment', [CalonController::class, 'trash'])->middleware('auth');
Route::get('/trash/position', [PosisiController::class, 'trash'])->middleware('auth');
//restore data
Route::get('/trash/employee/{pegawai}/restore', [PegawaiController::class, 'restore'])->withTrashed()->middleware('auth');
Route::get('/trash/attendance/{absensi}/restore', [AbsensiController::class, 'restore'])->withTrashed()->middleware('auth');
Route::get('/trash/recruitment/{calon}/restore', [CalonController::class, 'restore'])->withTrashed()->middleware('auth');
Route::get('/trash/position/{posisi}/restore', [PosisiController::class, 'restore'])->withTrashed()->middleware('auth');

//delete related table from calon
Route::get('/recruitment/education/{pendidikan}/delete', [CalonController::class, 'deleteEducation'])->middleware('auth');
Route::get('/recruitment/language/{bahasa}/delete', [CalonController::class, 'deleteLanguage'])->middleware('auth');
Route::get('/recruitment/exp/{pengalaman}/delete', [CalonController::class, 'deleteExperience'])->middleware('auth');
Route::get('/recruitment/family/{keluarga}/delete', [CalonController::class, 'deleteFamily'])->middleware('auth');
Route::get('/recruitment/organization/{organisasi}/delete', [CalonController::class, 'deleteOrganization'])->middleware('auth');
Route::get('/recruitment/scholarship/{beasiswa}/delete', [CalonController::class, 'deleteScholarship'])->middleware('auth');
Route::get('/recruitment/recruitment/{rekrut}/delete', [CalonController::class, 'deleteRecruitment'])->middleware('auth');
Route::get('/recruitment/relative/{relative}/delete', [CalonController::class, 'deleteRelative'])->middleware('auth');

//cetak pdf
Route::get('/recruitment/{calon}/download', [CalonController::class, 'generatePDF'])->name('recruitment.pdf');
