<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index']);
    Route::post('admin', [App\Http\Controllers\AdminController::class, 'admin']);
    
    });



Route::get('detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('index');
Route::post('detail/{id}', [App\Http\Controllers\DetailController::class, 'pesan']);
Route::get('check_out', [App\Http\Controllers\DetailController::class, 'check_out']);
Route::delete('check_out/{id}', [App\Http\Controllers\DetailController::class, 'delete']);
Route::delete('home/{id}', [App\Http\Controllers\HomeController::class, 'delete']);
Route::get('konfirmasi_check_out',[App\Http\Controllers\DetailController::class, 'konfirmasi']);



Route::get('profile',[App\Http\Controllers\ProfileController::class, 'index']);
Route::post('profile',[App\Http\Controllers\ProfileController::class, 'update']);

Route::get('history', [App\Http\Controllers\HistoryController::class, 'index'] );
Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail'] );


Auth::routes();

