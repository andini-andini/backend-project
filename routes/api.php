<?php

use App\Http\Controllers\AuthMahasiswaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SemproController;
use App\Http\Controllers\SkripsiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'mahasiswa'], function ($router) {
    Route::post('login', [AuthMahasiswaController::class, 'login']);
    Route::post('register', [AuthMahasiswaController::class, 'register']);

    Route::group(['middleware' => ['auth:mahasiswa']], function ($router) {
        Route::post('logout', [AuthMahasiswaController::class, 'logout']);
        Route::post('refresh', [AuthMahasiswaController::class, 'refresh']);
        Route::post('update/{id}', [AuthMahasiswaController::class, 'update']);
        Route::post('me', [AuthMahasiswaController::class, 'me']);
        Route::post('pengajuan/sempro', [PengajuanController::class, 'sempro']);
        Route::post('pengajuan/skripsi', [PengajuanController::class, 'skripsi']);
        Route::get('pengajuan/sempro', [SemproController::class, 'getSempro']);
        Route::get('pengajuan/sempro/{id}', [SemproController::class, 'getSemproDetail']);
        Route::get('pengajuan/sempro/{id}', [SemproController::class, 'getSemproDetail']);
        Route::get('pengajuan/skripsi', [SkripsiController::class, 'getSkripsi']);
        Route::get('pengajuan/skripsi/{id}', [SkripsiController::class, 'getSkripsiDetail']);
    });
});
