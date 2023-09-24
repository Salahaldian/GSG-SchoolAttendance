@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">Create Student Absence</div>
        <div class="card-body">
            <form action="{{ route('courses.students.absences.store', [$course->id, $student->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="day">Day</label>
                    <input type="text" name="day" id="day" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <textarea name="reason" id="reason" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
