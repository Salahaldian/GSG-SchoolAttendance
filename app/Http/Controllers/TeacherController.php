<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $teachers = $course->teachers;
        return view('teachers.index', compact('teachers', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('teachers.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $input = $request->all();
        $input['course_id'] = $course->id;
        $teacher = new Teacher($input);
        $course->teachers()->save($teacher);

        return redirect()->route('courses.teachers.index', $course)
            ->with('flash_message', 'Teacher Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect()->route('courses.teachers.index', $course)
            ->with('flash_message', 'Teacher Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, string $id)
    {
        $teacher = $course->teachers()->findOrFail($id);
        $teacher->delete();
        return redirect()->route('courses.teachers.index', $course)
            ->with('flash_message', 'Teacher deleted!');
    }

}
