<?php
// test 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResearchProjectController;
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('manager')->group(function () {
    Route::get('', [AccountController::class, 'index']);
    Route::get('create', [AccountController::class, 'create']);
    Route::post('store', [AccountController::class, 'store']);
    Route::delete('delete/{id}', [AccountController::class, 'destroy']);
});


Route::prefix('department')->group(function () {
    Route::get('', [DepartmentController::class, 'index']);
    Route::get('create', [DepartmentController::class, 'create']);
    Route::post('store', [DepartmentController::class, 'store']);
    Route::get('edit/{id}', [DepartmentController::class, 'edit']);
     Route::post('update/{id}', [DepartmentController::class, 'update']);
    Route::delete('delete/{id}', [DepartmentController::class, 'destroy']);
});

Route::prefix('course')->group(function () {
    Route::get('', [CourseController::class, 'index']);
    Route::get('create', [CourseController::class, 'create']);
    Route::post('store', [CourseController::class, 'store']);
    Route::get('edit/{id}', [CourseController::class, 'edit']);
    Route::post('update/{id}', [CourseController::class, 'update']);
    Route::delete('delete/{id}', [CourseController::class, 'destroy']);
});

Route::prefix('degree')->group(function () {
    Route::get('', [DegreeController::class, 'index']);
    Route::get('create', [DegreeController::class, 'create']);
    Route::post('store', [DegreeController::class, 'store']);
    Route::get('edit/{id}', [DegreeController::class, 'edit']);
    Route::post('update/{id}', [DegreeController::class, 'update']);
    Route::delete('delete/{id}', [DegreeController::class, 'destroy']);
});

Route::prefix('lecturer')->group(function () {
    Route::get('',       [LecturerController::class, 'index'  ] );
    Route::get('create', [LecturerController::class, 'create' ]);
    Route::post('store', [LecturerController::class, 'store'  ]);
    Route::get('edit/{id}', [LecturerController::class, 'edit']);
    Route::put('/lecturer/update/{id}', [LecturerController::class, 'update'])->name('lecturer.update');
    Route::delete('delete/{id}', [LecturerController::class, 'destroy']);
    Route::get('show/{id}', [LecturerController::class, 'show']);
    Route::get('search', [LecturerController::class, 'search'])->name('lecturer.search');
    Route::get('/lecturer/export-pdf', [LecturerController::class, 'exportPdf'])->name('lecturer.exportPdf');
});

// Admin
    Route::get('',    [AdminController::class, 'login'  ] )->name('login');
    Route::post('',   [AdminController::class, 'post_login'  ] );
    Route::get('/logout',[AdminController::class, 'logout'  ] );

// Salary
Route::prefix('salary')->group(function () {
    Route::get('', [App\Http\Controllers\SalaryController::class, 'index'])->name('salary.index');
    Route::get('search', [App\Http\Controllers\SalaryController::class, 'search'])->name('salary.search');
    Route::get('lecturer/{id}', [App\Http\Controllers\SalaryController::class, 'getLecturerDetails'])->name('salary.lecturer.details');
    Route::post('export', [App\Http\Controllers\SalaryController::class, 'export'])->name('salary.export');
    Route::get('create', [App\Http\Controllers\SalaryController::class, 'create'])->name('salary.create');
    Route::post('store', [App\Http\Controllers\SalaryController::class, 'store'])->name('salary.store');
    Route::get('edit/{id}', [App\Http\Controllers\SalaryController::class, 'edit'])->name('salary.edit');
    Route::put('update/{id}', [App\Http\Controllers\SalaryController::class, 'update'])->name('salary.update');
    Route::delete('delete/{id}', [App\Http\Controllers\SalaryController::class, 'destroy'])->name('salary.destroy');
    Route::get('print/{id}', [App\Http\Controllers\SalaryController::class, 'printSalarySlip'])->name('salary.print');
});
// Dashboard
    Route::get('dashboard',   [DashboardController::class, 'index'  ] );

Route::resource('research-projects', ResearchProjectController::class);