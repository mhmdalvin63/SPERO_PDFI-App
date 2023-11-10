<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\AdminAgendaController;

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

Route::get('/organisasi',[FrontEndController::class, 'organisasi'])->name('organisasi');
Route::get('/login', [LoginController::class, 'loginuser'])->name('login.user');
Route::post('/login', [LoginController::class, 'postloginuser'])->name('postlogin.user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/update', [FrontEndController::class, 'update'])->name('update');
Route::get('/update/tag/{slug}', [FrontEndController::class, 'detailtag'])->name('update.tag');
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/home', [FrontEndController::class, 'index'])->name('home');
Route::get('/detailupdate/{slug}', [FrontEndController::class, 'detailupdate'])->name('detailupdate');
Route::get('/agenda', [FrontEndController::class, 'agenda'])->name('agenda');
Route::get('/search', [FrontEndController::class, 'search'])->name('search');
Route::get('/search-agenda', [FrontEndController::class, 'searchagenda'])->name('search-agenda');
Route::get('/jurnal', [FrontEndController::class, 'jurnal'])->name('jurnal');

Route::get('/register', [LoginController::class, 'register'])->name('register.user');
Route::post('/register/store', [LoginController::class, 'postregister'])->name('postregister.user');
Route::get('/verified', [LoginController::class, 'verified'])->name('verified.user');
Route::get('/verified/{id}', [LoginController::class, 'postverified'])->name('postverified.user');

Route::get('/forgot-password', [LoginController::class, 'resetpassword'])->name('resetpassword.user');
Route::post('/forgot-password', [LoginController::class, 'postresetpassword'])->name('postresetpassword.user');
Route::get('/reset-password/{token}', [LoginController::class, 'mailreset'])->name('mailreset.user');
Route::post('/reset-password', [LoginController::class, 'aftermailreset'])->name('aftermailreset.user');
// Route::put('/reset/{id}', [LoginController::class, 'updatepassword'])->name('updatepassword.user');

Route::get('provinces', 'FrontEndController@provinces')->name('provinces');
Route::get('cities', 'FrontEndController@cities')->name('cities');
Route::get('districts', 'FrontEndController@districts')->name('districts');
Route::get('/detailagenda/{slug}', [FrontEndController::class, 'detailagenda'])->name('detailagenda');
Route::get('/dw-panduan/{file}', [FrontEndController::class, 'download'])->name('download');


Route::get('/countlike/{slug}', [FrontEndController::class, 'countliked'])->name('countliked');

Route::middleware(['isUser', 'auth:web', 'PreventBack'])->group(function (){
    Route::post('/daftar/{slug}', [FrontEndController::class, 'daftaragenda'])->name('daftaragenda');
    Route::post('/like/{slug}', [FrontEndController::class, 'liked'])->name('liked');
    Route::delete('/unlike/{slug}', [FrontEndController::class, 'unliked'])->name('unliked');
    Route::get('/myevent', [FrontEndController::class, 'myevent'])->name('myevent');

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
    Route::get('/12e61st3r', [LoginController::class, 'registercabang'])->name('register.cabang');
    Route::post('/register', [LoginController::class, 'postregistercabang'])->name('postregister.cabang');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['isAdmin', 'auth:web', 'PreventBack'])->prefix('/admin')->group(function (){
    // Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/agenda/pendaftar/{id}', [AdminAgendaController::class, 'pendaftar'])->name('pendaftar');
    Route::delete('/agenda/pendaftar/{id}', [AdminAgendaController::class, 'pendaftardelete'])->name('adminpendaftardelete');
    Route::put('/agenda/pendaftar/approve/{id}', [AdminAgendaController::class, 'approve'])->name('adminapprove');
    Route::post('/search', [AdminAgendaController::class, 'search'])->name('adminsearch');
    Route::resource('/tag', TagController::class);
    Route::resource('/anggota', AnggotaController::class);
    Route::resource('/tipe', TypeController::class);
    Route::resource('/agenda', AdminAgendaController::class);
    Route::resource('/update', UpdateController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/jurnal', JurnalController::class);
    Route::resource('/kepengurusan', OrganisasiController::class);
    Route::resource('/bidang', BidangController::class);
    Route::resource('/posisi', PosisiController::class);
    Route::resource('/user-management', UserController::class);
    Route::put('/user-management/resetpassword/{id}', [UserController::class, 'resetpassword'])->name('resetpassword');
    Route::put('/user-management/verified/{id}', [UserController::class, 'verified'])->name('verified');
    Route::put('/user-management/activated/{id}', [UserController::class, 'activated'])->name('activated');
    Route::put('/user-management/nonactivated/{id}', [UserController::class, 'nonactivated'])->name('nonactivated');
});
Route::delete('/agenda/foto/{id}', [AgendaController::class, 'deleteimage'])->name('deleteimage');
Route::delete('/agenda/image/{id}', [AdminAgendaController::class, 'deleteimage'])->name('deleteimage');
Route::delete('/update/image/{id}', [UpdateController::class, 'deleteimage'])->name('deleteimage');

Route::middleware(['isCabang', 'auth:web', 'PreventBack'])->prefix('/cabang')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'cabang'])->name('cbdashboard');
    Route::resource('/agenda', AgendaController::class);
    Route::resource('/anggota', AnggotaController::class);
    Route::resource('/tipe', TypeController::class);
    Route::get('/agenda/pendaftar/{id}', [AgendaController::class, 'pendaftar'])->name('pendaftar');
    Route::delete('/agenda/pendaftar/{id}', [AgendaController::class, 'pendaftardelete'])->name('pendaftardelete');
    Route::put('/agenda/pendaftar/approve/{id}', [AgendaController::class, 'approve'])->name('approve');
    Route::post('/search', [AgendaController::class, 'search'])->name('search');
});

Route::get('/fetch-data', [FrontEndController::class, 'fetchData']);
// Route::get('/', function () {return view('pages.beranda');});
// Route::get('update', function () {return view('pages.update');});
// Route::get('detailupdate', function () {return view('pages.detailUpdate');});
// Route::get('agenda', function () {return view('pages.agenda');});
// Route::get('detailagenda', function () {return view('pages.detailAgenda');});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
