<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;

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
    return view('auth.login');
});
 
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
 Route::group(['middleware' => ['role:admin']], function () {
Route::group(['prefix' => 'table'], function () {
Route::get('/data-user',[App\Http\Controllers\UserController::class, 'data'])->name('user.table');
Route::get('/data-mahasiswa',[App\Http\Controllers\MahasiswaController::class, 'data'])->name('mahasiswa.table');
});
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('user', UserController::class)->except('destroy');
Route::resource('mahasiswa', MahasiswaController::class)->except('destroy');
  Route::group(['prefix' => 'delete'], function () {
    Route::get('mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
  });
});
});