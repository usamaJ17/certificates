<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/import', [App\Http\Controllers\CertificatesController::class, 'importForm'])->name('import.form');
Route::post('admin/import', [App\Http\Controllers\CertificatesController::class, 'importData'])->name('import.excel');

Route::get('admin/certificates', [App\Http\Controllers\CertificatesController::class, 'index'])->name('admin.certificates.view');
