<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentAbsence;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class StudentAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course, Student $student)
    {
        $absences = $student->absences;
        return view('students.absences.index', compact('course', 'student', 'absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course, Student $student)
    {
        return view('students.absences.create', compact( 'course','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course, Student $student)
    {
        $input = $request->all();
        $input['student_id'] = $student->id;
        $absence = new StudentAbsence($input);
        $student->absences()->save($absence);
        return redirect()->route('courses.students.absences.index', [$course->id, $student->id])
            ->with('flash_message', 'Absence Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Student $student, StudentAbsence $absence)
    {
        return view('students.absences.show', compact( 'course', 'student', 'absence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Student $student, StudentAbsence $absence)
    {
        return view('students.absences.edit', compact( 'course', 'student', 'absence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, Student $student, StudentAbsence $absence)
    {
        $input = $request->all();
        $absence->update($input);
        return redirect()->route('courses.students.absences.index', [$course->id, $student->id])
            ->with('flash_message', 'Absence Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Student $student, StudentAbsence $absence)
    {
        $absence->delete();
        return redirect()->route('courses.students.absences.index', [$course->id, $student->id])
            ->with('flash_message', 'Absence deleted!');
    }

    public function generatePdf(Course $course, Student $student)
    {
        $absences = $student->absences;
        $today = now()->format('Y-m-d');
        $pdf = PDF::loadView('pdf.student_absences', compact('absences', 'student', 'today')); // قم بتمرير المتغير $student

        return $pdf->stream('student_absences.pdf'); // استخدم دالة stream() بدلاً من download() لعرض الملف مباشرة
    }

}
