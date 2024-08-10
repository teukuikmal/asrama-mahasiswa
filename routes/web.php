<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PelajaranController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {

    //data mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
    Route::resource('mahasiswa', MahasiswaController::class)->except(['show']);

    //data pengajar
    Route::get('/pengajar/', [PengajarController::class, 'index'])->middleware('auth');
    Route::get('/pengajar/form/', [PengajarController::class, 'create'])->middleware('auth');
    Route::post('/pengajar/store/', [PengajarController::class, 'store'])->middleware('auth');
    Route::get('/pengajar/edit/{id}', [PengajarController::class, 'edit'])->middleware('auth');
    Route::put('/pengajar/{id}', [PengajarController::class, 'update'])->middleware('auth');
    Route::delete('/pengajar/{pengajar}', [PengajarController::class, 'destroy'])->name('pengajar.destroy');
    Route::delete('/pengajar/{id}', [PengajarController::class, 'destroy'])->middleware('auth');
    Route::resource('pengajar', PengajarController::class);
    Route::resource('pengajar', PengajarController::class)->except(['show']);
    

    // Data kamar
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/kamar/form', [KamarController::class, 'create'])->name('kamar.create');
    Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
    Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
    Route::resource('kamar', KamarController::class)->except(['show']);

    //data pelajaran
    Route::get('/pelajaran/', [PelajaranController::class, 'index'])->middleware('auth');
    Route::get('/pelajaran/form/', [PelajaranController::class, 'create'])->middleware('auth');
    Route::post('/pelajaran/store/', [PelajaranController::class, 'store'])->middleware('auth');
    Route::get('/pelajaran/edit/{id}', [PelajaranController::class, 'edit'])->middleware('auth');
    Route::put('/pelajaran/{id}', [PelajaranController::class, 'update'])->middleware('auth');
    Route::delete('/pelajaran/{id}', [PelajaranController::class, 'destroy'])->middleware('auth');
    Route::resource('pelajaran', PelajaranController::class)->except(['show']);

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


});

