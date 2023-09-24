@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Absence Details</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Date : {{ $absence->date }}</h5>
                <p class="card-text">Day : {{ $absence->day }}</p>
                <p class="card-text">Reason : {{ $absence->reason }}</p>
            </div>
            <hr>
{{--            <a href="{{ route('courses.students.absences.edit', [$course->id, $student->id, $absence->id]) }}" class="btn btn-primary btn-sm" title="Edit Absence">--}}
{{--                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit--}}
{{--            </a>--}}
        </div>
    </div>
@endsection
