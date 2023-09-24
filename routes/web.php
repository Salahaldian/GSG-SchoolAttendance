<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentAbsenceController;
use App\Http\Controllers\TeacherAbsenceController;
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

Route::resource('/courses', CourseController::class);

Route::resource('courses.students', StudentController::class);

Route::resource('courses.teachers', TeacherController::class);

Route::resource('courses.students.absences', StudentAbsenceController::class);

Route::get('/generate-pdf/{course}/{student}', [StudentAbsenceController::class, 'generatePdf'])->name('generate-pdf');
Route::post('/generate-pdf/{course}/{student}', [StudentAbsenceController::class, 'generatePdf'])->name('generate-pdf');

Route::resource('courses.teachers.absences', TeacherAbsenceController::class);
