<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

>>>>>>> d389ec7e1a3733a196c42bda4230a8eb282c0417
*/

Route::get('/', function () {
    return view('welcome');
});



// Route::prefix('manager')->middleware('admin_auth')->group(function () {
Route::prefix('manager')->group(function () {
    Route::get('', [AccountController::class, 'index']);
    Route::get('create', [AccountController::class, 'create']);
    Route::post('store', [AccountController::class, 'store']);
    // Route::get('edit/{id}', [UserController::class, 'edit']);
    // Route::post('update/{id}', [UserController::class, 'update']);
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
});

// Admin
    Route::get('',    [AdminController::class, 'login'  ] )->name('login');
    Route::post('',   [AdminController::class, 'post_login'  ] );
    Route::get('/logout',[AdminController::class, 'logout'  ] );

// Salary

    Route::prefix('salary')->group(function () {
    Route::get('',       [SalaryController::class, 'index'  ] );
                                            });
// Dashboard
    Route::get('dashboard',   [DashboardController::class, 'index'  ] );