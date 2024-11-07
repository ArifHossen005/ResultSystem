<?php

use App\Http\Controllers\CalculateMarksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;

// Dashboard
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Student Routes
Route::prefix('students')->group(function () {
    Route::get('/add', [StudentController::class, 'add'])->name('add-student');
    Route::post('/store', [StudentController::class, 'store'])->name('store-student');
    Route::get('/manage', [StudentController::class, 'manage'])->name('manage-student');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student-edit');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('student-update');
    Route::delete('/delete/{id}', [StudentController::class, 'delete'])->name('student-delete');
});

// Course Routes
Route::prefix('courses')->group(function () {
    Route::get('/add', [CourseController::class, 'add'])->name('add-course');
    Route::post('/store', [CourseController::class, 'store'])->name('store-course');
    Route::get('/manage', [CourseController::class, 'manage'])->name('manage-course');
    Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('course-edit');
    Route::post('/update/{id}', [CourseController::class, 'update'])->name('course-update');
    Route::delete('/delete/{id}', [CourseController::class, 'delete'])->name('course-delete');
});

// Course Routes
Route::prefix('results')->group(function () {
    Route::get('/add', [ResultController::class, 'add'])->name('add-result');
    Route::post('/store', [ResultController::class, 'store'])->name('store-result');
    Route::get('/manage', [ResultController::class, 'manage'])->name('manage-result');
    Route::get('/edit/{id}', [ResultController::class, 'edit'])->name('result-edit');
    Route::post('/update/{id}', [ResultController::class, 'update'])->name('result-update');
    Route::delete('/delete/{id}', [ResultController::class, 'delete'])->name('result-delete');

});
// marks Routes
Route::prefix('results')->group(function () {
    Route::get('/totalMarks', [CalculateMarksController::class, 'index'])->name('totalMarks');

});
