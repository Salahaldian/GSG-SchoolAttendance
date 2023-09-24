@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Edit Absence</div>
        <div class="card-body">
            <form action="{{ route('courses.students.absences.update', [$course->id, $student->id, $absence->id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $absence->id }}" />
                <label>Date</label><br>
                <input type="date" name="date" value="{{ $absence->date }}" class="form-control"><br>
                <label>Day</label><br>
                <input type="text" name="day" value="{{ $absence->day }}" class="form-control"><br>
                <label>Reason</label><br>
                <input type="text" name="reason" value="{{ $absence->reason }}" class="form-control"><br>
                <input type="submit" value="Update" class="btn btn-success"><br>
            </form>
        </div>
    </div>
@endsection
