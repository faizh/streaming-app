<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    echo 1;
});

Route::get('/login', function () {
  return view('login');
})->name('login');

Route::post('/act_login', [AdminController::class, "authenticate"])->name('login.auth');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::group(["prefix" => "admin", "middleware" => "auth"], function () {
    Route::get('/', [AdminController::class, "dashboard"])->name('dashboard');  
    Route::get('/video', [VideoController::class, "index"])->name('video');
    Route::get('/video-create', [VideoController::class, "create"])->name('video.create');
    Route::post('video-store', [VideoController::class, "store"])->name('video.store');
    Route::get('/video-view/{id}', [VideoController::class, "show"])->name('video.view');
    Route::get('/video-edit/{id}', [VideoController::class, "edit"])->name('video.edit');
    Route::get('/video-delete/{id}', [VideoController::class, "destroy"])->name('video.delete');
});