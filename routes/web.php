<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\AnggotaController;
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
Route::get('organisasi', function () {return view('pages.organisasi');});
Route::get('/login', [LoginController::class, 'loginuser'])->name('login.user');
Route::post('/login', [LoginController::class, 'postloginuser'])->name('postlogin.user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/update', [FrontEndController::class, 'update'])->name('update');
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/home', [FrontEndController::class, 'index'])->name('home');
Route::get('/detailupdate/{id}', [FrontEndController::class, 'detailupdate'])->name('detailupdate');
Route::get('/agenda', [FrontEndController::class, 'agenda'])->name('agenda');

Route::get('/register', [LoginController::class, 'register'])->name('register.user');
Route::post('/register/store', [LoginController::class, 'postregister'])->name('postregister.user');
Route::get('/verified', [LoginController::class, 'verified'])->name('verified.user');
Route::get('/verified/{id}', [LoginController::class, 'postverified'])->name('postverified.user');

Route::get('/reset-password', [LoginController::class, 'resetpassword'])->name('resetpassword.user');
// Route::post('/reset-password', [LoginController::class, 'postresetpassword'])->name('postresetpassword.user');
// Route::get('/reset-password/{id}', [LoginController::class, 'mailreset'])->name('mailreset.user');
// Route::get('/reset', [LoginController::class, 'aftermailreset'])->name('aftermailreset.user');
// Route::put('/reset/{id}', [LoginController::class, 'updatepassword'])->name('updatepassword.user');

Route::get('provinces', 'FrontEndController@provinces')->name('provinces');
Route::get('cities', 'FrontEndController@cities')->name('cities');
Route::get('districts', 'FrontEndController@districts')->name('districts');

Route::middleware(['isUser', 'auth:web', 'PreventBack'])->group(function (){
    Route::get('/detailagenda/{id}', [FrontEndController::class, 'detailagenda'])->name('detailagenda');
    Route::post('/daftar/{id}', [FrontEndController::class, 'daftaragenda'])->name('daftaragenda');

    Route::post('/getkota', [FrontEndController::class, 'kota'])->name('kota');
    Route::post('/getkecamatan', [FrontEndController::class, 'kecamatan'])->name('kecamatan');

});

Route::prefix('/admin')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/cabang')->group(function (){
    Route::get('/login', [LoginController::class, 'logincabang'])->name('login.cabang');
    Route::post('/login', [LoginController::class, 'postlogincabang'])->name('postlogin.cabang');
    Route::get('/register', [LoginController::class, 'registercabang'])->name('register.cabang');
    Route::post('/register', [LoginController::class, 'postregistercabang'])->name('postregister.cabang');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['isAdmin', 'auth:web', 'PreventBack'])->prefix('/admin')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/agenda', [AgendaController::class, 'indexagenda'])->name('indexagenda');
    Route::get('/agenda/pendaftar/{id}', [AgendaController::class, 'pendaftar'])->name('pendaftar');
    Route::resource('/tag', TagController::class);
    Route::resource('/update', UpdateController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/user-management', UserController::class);
    Route::put('/user-management/resetpassword/{id}', [UserController::class, 'resetpassword'])->name('resetpassword');
});

Route::middleware(['isCabang', 'auth:web', 'PreventBack'])->prefix('/cabang')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'cabang'])->name('cbdashboard');
    Route::resource('/agenda', AgendaController::class);
    Route::resource('/anggota', AnggotaController::class);
    Route::resource('/tipe', TypeController::class);
    Route::get('/agenda/pendaftar/{id}', [AgendaController::class, 'pendaftar'])->name('pendaftar');
    Route::delete('/agenda/pendaftar/{id}', [AgendaController::class, 'pendaftardelete'])->name('pendaftardelete');
    Route::put('/agenda/pendaftar/approve/{id}', [AgendaController::class, 'approve'])->name('approve');
});


// Route::get('/', function () {return view('pages.beranda');});
// Route::get('update', function () {return view('pages.update');});
// Route::get('detailupdate', function () {return view('pages.detailUpdate');});
// Route::get('agenda', function () {return view('pages.agenda');});
// Route::get('detailagenda', function () {return view('pages.detailAgenda');});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
