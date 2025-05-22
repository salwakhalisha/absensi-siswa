<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('utama.welcome');
});

Route::view('/', 'utama.login');

Route::get('/gurumurid', function () {
    return view('gurumurid.index', [
        "menu" => "index"
    ]);
})->name('gurumurid.index');

Route::get('/siswaa', function () {
    return view('siswaa.index', [
        "menu" => "index"
    ]);
})->name('siswaa.index');

Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin'])->name('dashboard.admin');
Route::get('/index', [DashboardController::class, 'dashboardadmin'])->name('index');

Route::get('ditolak',function(){
    return view('utama.dilarang');
})->name('dilarang');


Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::resource('guru', gurucontroller::class);
// Route::resource('lokal',lokalcontroller ::class);
// Route::resource('jurusan', jurusancontroller::class);
// Route::resource('user', UserController::class); 
// Route::resource('siswa', siswacontroller::class);
// Route::resource('absen', AbsensController::class);

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/update', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'destroy'])->name('jurusan.delete');  

Route::get('/user', [UserController::class, 'user'])->name('user.index');


Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::get('/guru/show/{id}', [GuruController::class, 'show'])->name('guru.show');
Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.delete');  

Route::get('/lokal', [LokalController::class, 'index'])->name('lokal.index');
Route::get('/lokal/create', [LokalController::class, 'create'])->name('lokal.create');
Route::post('/lokal', [LokalController::class, 'store'])->name('lokal.store');
Route::get('/lokal/edit/{id}', [LokalController::class, 'edit'])->name('lokal.edit');
Route::put('/lokal/{id}', [LokalController::class, 'update'])->name('lokal.update');
Route::get('/lokal/show/{id}', [LokalController::class, 'show'])->name('lokal.show');
Route::delete('/lokal/delete/{id}', [LokalController::class, 'destroy'])->name('lokal.delete');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/show/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');

Route::get('/absen', [AbsensController::class, 'index'])->name('absen.index');
Route::get('/absen/create', [AbsensController::class, 'create'])->name('absen.create');
Route::post('/absen/create', [AbsensController::class, 'create'])->name('absen.create');
Route::post('/absen/store', [AbsensController::class, 'store'])->name('absen.store');
Route::get('absen/{id}/edit', [AbsensController::class, 'edit'])->name('absen.edit');
Route::put('absen/{id}', [AbsensController::class, 'update'])->name('absen.update');
Route::get('/absen/riwayat', [AbsensController::class, 'riwayat'])->name('absen.riwayat');
Route::post('/absen/update-status', [AbsensController::class, 'updateStatus'])->name('absen.updateStatus');
Route::get('/siswa/absen/riwayat', [AbsensController::class, 'riwayatSiswa'])->name('siswaa.absen.riwayat');


Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/walikelas/pengajuan', [PengajuanController::class, 'index3'])->name('pengajuan.walikelas.index');
Route::post('/pengajuan/{id}/update-status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');
Route::get('/admin/pengajuan', [PengajuanController::class, 'indexAdmin'])->name('pengajuan.admin.index');

    
