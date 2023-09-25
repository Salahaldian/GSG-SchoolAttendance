<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function count()
    {
        $numStudents = Student::count();
        $numTeachers = Teacher::count();
        $numCourses = Course::count();

        return view('welcome', compact('numStudents', 'numTeachers', 'numCourses'));
    }
}
