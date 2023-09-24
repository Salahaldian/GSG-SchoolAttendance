@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">
            <form action="{{ route('courses.students.update', [$course->id, $student->id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="id" id="id" value="{{ $student->id }}" id="id" />
                <label>Name</label><br>
                <input type="text" name="name" id="name" value="{{ $student->name }}" class="form-control"><br>
                <label>Address</label><br>
                <input type="text" name="address" id="address" value="{{ $student->address }}" class="form-control"><br>
                <label>Mobile</label><br>
                <input type="text" name="mobile" id="mobile" value="{{ $student->mobile }}" class="form-control"><br>
                <input type="submit" value="Update" class="btn btn-success"><br>
            </form>
        </div>
    </div>
@endsection
