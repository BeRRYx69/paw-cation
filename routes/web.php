<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PetHotelController;
use App\Http\Controllers\BookAntreanController;

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

// Landing page route
Route::get('/', function () {
    return view('landing');
})->name('landing');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/carijadwal', [App\Http\Controllers\JadwalController::class, 'carijadwal'])->name('carihome');

Route::get('/home/daftar/{id}', [App\Http\Controllers\HomeController::class, 'bookantrean'])->name('registrasiantrean');
Route::post('/home/daftar/konfirmasi', [App\Http\Controllers\HomeController::class, 'konfirmasidaftar'])->name('konfirmasidaftar');
Route::get('/home/riwayat', [App\Http\Controllers\HomeController::class, 'daftarbooking'])->name('daftarantrean');
Route::delete('/home/riwayat/batalkan/{id_antrean}/{id_jadwal}', [App\Http\Controllers\HomeController::class, 'batalkan'])->name('batalkan');

Route::get('/home/rules',  [App\Http\Controllers\HomeController::class, 'rules'])->name('rule');

Route::get('/riwayat/view/{id_antrean}', [App\Http\Controllers\HomeController::class, 'viewpdf'])->name('viewpdf');
Route::get('/home/riwayat/cetakpdf/{id_antrean}',  [App\Http\Controllers\HomeController::class, 'cetakpdf'])->name('cetak');

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.welcome');
    })->name('welcome');

    Auth::routes(['verify' => true]);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('jadwal', HomeController::class);

    Route::get('/daftarantrean', 'AntreanController@index')->name('listantrean');
    Route::get('/daftarantrean/disetujui/{id_antrean}', 'AntreanController@disetujui')->name('disetujui');
    Route::get('/daftarantrean/selesai/{id_antrean}', 'AntreanController@selesai')->name('selesai');
    Route::get('/daftarantrean/cari', 'AntreanController@cari');

    Route::resource('antrean', AntreanController::class);

    Route::resource('user', UserController::class);
    Route::get('/users', 'UserController@index')->name('user');
    Route::get('/users/search', 'UserController@search');

});

// Social Login Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

// Jadwal Routes
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/pet-hotel', [PetHotelController::class, 'index'])->name('pet-hotel.index');
    Route::get('/pet-hotel/create', [PetHotelController::class, 'create'])->name('pet-hotel.create');
    Route::post('/pet-hotel', [PetHotelController::class, 'store'])->name('pet-hotel.store');
    Route::get('/pet-hotel/{petHotel}', [PetHotelController::class, 'show'])->name('pet-hotel.show');
    Route::patch('/pet-hotel/{petHotel}/cancel', [PetHotelController::class, 'cancel'])->name('pet-hotel.cancel');
    
    // Book Antrean Routes
    Route::get('/bookantrean', [BookAntreanController::class, 'index'])->name('bookantrean');
    Route::post('/home/daftar/konfirmasi', [App\Http\Controllers\HomeController::class, 'konfirmasidaftar'])->name('konfirmasidaftar');
    Route::get('/home/riwayat', [App\Http\Controllers\HomeController::class, 'daftarbooking'])->name('daftarantrean');
    Route::delete('/home/riwayat/batalkan/{id_antrean}/{id_jadwal}', [App\Http\Controllers\HomeController::class, 'batalkan'])->name('batalkan');
    Route::get('/bookantrean/{jadwal_id}', [App\Http\Controllers\BookAntreanController::class, 'create'])->name('booking.create');

    // Booking by jenis hewan
    Route::get('/booking/jenis/{jenis_hewan}', [App\Http\Controllers\BookAntreanController::class, 'bookingByJenis'])->name('booking.byjenis');
});
