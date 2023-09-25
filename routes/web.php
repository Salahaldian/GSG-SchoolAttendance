<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAbsenceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherAbsenceController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/courses', CourseController::class);

    Route::resource('courses.students', StudentController::class);

    Route::resource('courses.teachers', TeacherController::class);

    Route::resource('courses.students.absences', StudentAbsenceController::class);

    Route::get('/generate-pdf-student/{course}/{student}', [StudentAbsenceController::class, 'generatePdf'])
        ->name('generate-pdf-student');
    Route::post('/generate-pdf-student/{course}/{student}', [StudentAbsenceController::class, 'generatePdf'])
        ->name('generate-pdf-student');

    Route::resource('courses.teachers.absences', TeacherAbsenceController::class);

    Route::get('/generate-pdf-teacher/{course}/{teacher}', [TeacherAbsenceController::class, 'generatePdf'])
        ->name('generate-pdf-teacher');
    Route::post('/generate-pdf-teacher/{course}/{teacher}', [TeacherAbsenceController::class, 'generatePdf'])
        ->name('generate-pdf-teacher');
});

require __DIR__.'/auth.php';
