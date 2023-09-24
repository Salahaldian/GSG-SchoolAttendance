<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course, Teacher $teacher)
    {
        $absences = $teacher->absences;
        return view('teachers.absences.index', compact('course', 'teacher', 'absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course, Teacher $teacher)
    {
        return view('teachers.absences.create', compact('course', 'teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course, Teacher $teacher)
    {
        $input = $request->all();
        $input['teacher_id'] = $teacher->id;
        $absence = new TeacherAbsence($input);
        $teacher->absences()->save($absence);
        return redirect()->route('courses.teachers.absences.index', [$course->id, $teacher->id])
            ->with('flash_message', 'Absence Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Teacher $teacher, TeacherAbsence $absence)
    {
        return view('teachers.absences.show', compact('course', 'teacher', 'absence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Teacher $teacher, TeacherAbsence $absence)
    {
        return view('teachers.absences.edit', compact('course', 'teacher', 'absence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, Teacher $teacher, TeacherAbsence $absence)
    {
        $input = $request->all();
        $absence->update($input);
        return redirect()->route('courses.teachers.absences.index', [$course->id, $teacher->id])
            ->with('flash_message', 'Absence Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Teacher $teacher, TeacherAbsence $absence)
    {
        $absence->delete();
        return redirect()->route('courses.teachers.absences.index', [$course->id, $teacher->id])
            ->with('flash_message', 'Absence deleted!');
    }

}
