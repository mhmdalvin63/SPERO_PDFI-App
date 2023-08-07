<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FrontEndController;

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

Route::prefix('/admin')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [LoginController::class, 'index'])->name('logout');
});

Route::middleware(['isAdmin', 'auth:web', 'PreventBack'])->prefix('/admin')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('/update', UpdateController::class);
    Route::resource('/agenda', AgendaController::class);
    Route::resource('/anggota', AnggotaController::class);
    Route::resource('/tipe', TypeController::class);
});

Route::get('/update', [FrontEndController::class, 'update'])->name('update');
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/home', [FrontEndController::class, 'index'])->name('home');
Route::get('/detailupdate/{id}', [FrontEndController::class, 'detailupdate'])->name('detailupdate');
Route::get('/detailagenda/{id}', [FrontEndController::class, 'detailagenda'])->name('detailagenda');
Route::get('/agenda', [FrontEndController::class, 'agenda'])->name('agenda');

// Route::get('/', function () {return view('pages.beranda');});
// Route::get('update', function () {return view('pages.update');});
// Route::get('detailupdate', function () {return view('pages.detailUpdate');});
// Route::get('agenda', function () {return view('pages.agenda');});
// Route::get('detailagenda', function () {return view('pages.detailAgenda');});
Route::get('organisasi', function () {return view('pages.organisasi');});
