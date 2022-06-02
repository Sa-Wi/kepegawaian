<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\LoginController;
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
    return view('dashboard');
});

//rekrutmen
Route::get('recruitment/new', [CalonController::class, 'create']);
Route::resource('recruitment', CalonController::class);

//absensi
Route::get('/attendance/manage', [AbsensiController::class, 'index']);
Route::post('/attendance/manage', [AbsensiController::class, 'import']);

//login admin
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
