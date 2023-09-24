<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $students = $course->students;

        return view('students.index', compact('students', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('students.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $input = $request->all();
        $input['course_id'] = $course->id;
        $student = new Student($input);
        $course->students()->save($student);

        return redirect()->route('courses.students.index', $course)
            ->with('flash_message', 'Student Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, string $id)
    {
        $students = $course->students()->findOrFail($id  );

        return view('students.show', compact('students', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, string $id)
    {
        $student = $course->students()->findOrFail($id);

        return view('students.edit', compact('student', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, string $id)
    {
        $student = $course->students()->findOrFail($id);
        $input = $request->all();
        $student->update($input);
        return redirect()->route('courses.students.index', $course)
            ->with('flash_message', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, string $id)
    {
        $student = $course->students()->findOrFail($id);
        $student->delete();
        return redirect()->route('courses.students.index', $course)
            ->with('flash_message', 'Student deleted!');
    }
}
