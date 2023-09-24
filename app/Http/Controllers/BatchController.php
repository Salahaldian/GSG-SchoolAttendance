<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index')
            ->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('batches.create' , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')
            ->with('flash_message', 'Batch Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Batch::findOrFail($id);
        return view('batches.show')
            ->with('batches', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batches = Batch::findOrFail($id);
        $courses = Course::all();
        return view('batches.edit', compact('batches', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Batch::findOrFail($id);
        $input = $request->all();
        $course->update($input);
        return redirect('batches')
            ->with('flash_message', 'Batch Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch deleted!');
    }
}
