<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTE SEMENTARA UNTUK FRONTEND (hanya untuk test tampilan)
|--------------------------------------------------------------------------
| Backend developer akan mengganti semua ini dengan controller,
| autentikasi asli, dan middleware 'auth'.
| JANGAN di-commit ke branch backend jika sudah ada route asli.
*/

Route::view('/', 'welcome');
Route::view('/masuk', 'auth')->name('login');
Route::view('/daftar', 'auth')->name('register');

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/pengingat-obat', 'medications')->name('medications');
Route::view('/jadwal-kontrol', 'controls')->name('controls');
Route::view('/pendamping', 'caregivers')->name('caregivers');
Route::view('/profil-lansia', 'elder')->name('elder');

// Halaman tambahan
Route::view('/pengingat-obat/{id}/ubah', 'medications-edit')->name('medications.edit');
Route::view('/jadwal-kontrol/{id}/ubah', 'controls-edit')->name('controls.edit');
Route::view('/pendamping/{id}', 'caregiver-detail')->name('caregivers.show');
Route::view('/profil-akun', 'account')->name('account');
Route::view('/anggota-keluarga', 'family')->name('family');
Route::view('/tentang', 'about')->name('about');
Route::view('/bantuan', 'help')->name('help');

/*
|--------------------------------------------------------------------------
| MODE TEST FRONTEND (HAPUS jika backend sudah jadi)
|--------------------------------------------------------------------------
*/

// // Login dan daftar: langsung masuk ke dashboard tanpa cek akun.
// Route::post('/masuk', fn () => redirect()->route('dashboard'))->name('login.store');
// Route::post('/daftar', fn () => redirect()->route('dashboard'))->name('register.store');

// // Keluar dari akun: kembali ke landing page.
// Route::post('/keluar', fn () => redirect('/'))->name('logout');

// // Semua form lain (simpan, ubah, hapus, tandai): kembali ke halaman yang sama
// // dengan pesan sukses, sekaligus untuk mencoba tampilan komponen alert.
// Route::match(['post', 'put', 'patch', 'delete'], '{any}', function () {
//     return back()->with('status', 'Mode test frontend: aksi ini belum tersambung ke backend.');
// })->where('any', '.*');