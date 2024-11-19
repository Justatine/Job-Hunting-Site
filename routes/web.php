<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, '__invoke'])->name('jobs.index');
Route::get('/job/{job}', [JobController::class, 'view']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/sign-in', [AuthController::class, '__invoke'])->name('login');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {

    // Jobs
    Route::get('/', [AdminController::class, '__invoke']);
    Route::post('/jobs/store', [JobController::class, 'store']);
    Route::delete('/jobs/{job}', [JobController::class, 'delete']);
    Route::get('/jobs/{job}', [JobController::class, 'edit']);
    Route::get('/view/jobs/{job}', [JobController::class, 'viewPage']);
    Route::put('/jobs/{job}', [JobController::class, 'update']);

    //User
    Route::post('/users/store', [UsersController::class, 'store']);
    Route::delete('/users/{user}', [UsersController::class, 'delete']);
    Route::get('/users/{user}', [UsersController::class, 'edit']);
    Route::get('/view/users/{user}', [UsersController::class, 'view']);
    Route::put('/users/{user}', [UsersController::class, 'update']);
});

Route::prefix('company')->middleware(['auth', 'is_company'])->group(function () {
    // Jobs
    Route::get('/', [CompanyController::class, '__invoke']);
    Route::post('/jobs/store', [JobController::class, 'store']);
    Route::delete('/jobs/{job}', [JobController::class, 'delete']);
    Route::get('/jobs/{job}', [JobController::class, 'edit']);
    Route::get('/view/jobs/{job}', [JobController::class, 'viewPage']);
    Route::put('/jobs/{job}', [JobController::class, 'update']);
});

Route::middleware(['auth', 'is_authenticated'])->group(function () {
    // Jobs
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/job/{id}', [JobController::class, 'apply']);
});