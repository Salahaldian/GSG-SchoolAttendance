@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Enrollment Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $enrollment->enroll_no }}</h5>
                <p class="card-text">Syllabus : {{ $enrollment->batch->name }}</p>
                <p class="card-text">Duration : {{ $enrollment->student->name }}</p>
                <p class="card-text">Duration : {{ $enrollment->join_date }}</p>
                <p class="card-text">Duration : {{ $enrollment->fee }}</p>
            </div>
        </div>
    </div>
@endsection
