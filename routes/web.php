<?php

use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('admin/import', [CertificatesController::class, 'importForm'])->name('import.form');
    Route::post('admin/import', [CertificatesController::class, 'importData'])->name('import.excel');

    Route::get('admin/import/employees', [EmployeeController::class, 'importEmployeeForm'])->name('import.employee.form');
    Route::post('admin/import/employees', [EmployeeController::class, 'importEmployeeData'])->name('import.employee.excel');
    Route::get('admin/employees', [EmployeeController::class, 'employeeData'])->name('admin.employee');

    Route::get('admin/certificates', [CertificatesController::class, 'index'])->name('admin.certificates.view');
    Route::get('certificates/data', [CertificatesController::class, 'getData'])->name('certificates.data');
    Route::delete('certificates/delete/{id}', [CertificatesController::class, 'deleteCert'])->name('certificates.delete');
    Route::get('admin/certificates/create', [CertificatesController::class, 'create'])->name('admin.certificates.create');
    Route::post('admin/certificates/create', [CertificatesController::class, 'store'])->name('admin.certificates.save');
    Route::resource('users', UserController::class);
});
Route::get('certificates/verify', [CertificatesController::class, 'certForm'])->name('certificates.form');
Route::post('certificates/verify', [CertificatesController::class, 'certVerify'])->name('certificates.verify');
Route::get('certificates/view/{code}', [CertificatesController::class, 'publicView'])->name('certificates.view');

Route::get('certificates/image/{code}', [CertificatesController::class, 'getImage'])->name('certificates.image');
Route::get('certificates/template/{code}', [CertificatesController::class, 'generateTemplate'])->name('certificates.template');


Route::get('clear_cache', function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return 'Cleared!';
});
