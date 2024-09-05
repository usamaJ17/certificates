<?php

use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin/certificates');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('admin/import', [App\Http\Controllers\CertificatesController::class, 'importForm'])->name('import.form');
    Route::post('admin/import', [App\Http\Controllers\CertificatesController::class, 'importData'])->name('import.excel');

    Route::get('admin/import/employees', [App\Http\Controllers\EmployeeController::class, 'importEmployeeForm'])->name('import.employee.form');
    Route::post('admin/import/employees', [App\Http\Controllers\EmployeeController::class, 'importEmployeeData'])->name('import.employee.excel');
    Route::get('admin/employees', [App\Http\Controllers\EmployeeController::class, 'employeeData'])->name('admin.employee');
    
    Route::get('admin/certificates', [App\Http\Controllers\CertificatesController::class, 'index'])->name('admin.certificates.view');    
    Route::get('admin/certificates/create', [CertificatesController::class, 'create'])->name('admin.certificates.create');
    Route::post('admin/certificates/create', [CertificatesController::class, 'store'])->name('admin.certificates.save');
    Route::resource('users', UserController::class);
});

