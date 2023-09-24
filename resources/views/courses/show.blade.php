@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Courses Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $courses->name }}</h5>
                <p class="card-text">Syllabus : {{ $courses->syllabus }}</p>
                <p class="card-text">Duration : {{ $courses->duration() }}</p>
            </div>
            <hr>
            <p>
                <a href="{{ route('courses.teachers.index', $courses->id) }}" class="btn btn-outline-dark" style="background-color: #04AA6D; color: white;">Show the Teacher For This Course</a>
            </p>
            <p>
                <a href="{{ route('courses.students.index', $courses->id) }}" class="btn btn-outline-dark" style="background-color: #04AA6D; color: white;">Show the Students For This Course</a>
            </p>
        </div>
    </div>
@endsection
