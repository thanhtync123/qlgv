<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;



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
    // Route::get('edit/{id}', [DepartmentController::class, 'edit']);
    //  Route::post('update/{id}', [DepartmentController::class, 'update']);
    Route::delete('delete/{id}', [CourseController::class, 'destroy']);
});