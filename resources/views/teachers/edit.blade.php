@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">
            <form action="{{ route('courses.teachers.update', [$course->id, $teacher->id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="id" id="id" value="{{ $teacher->id }}" id="id" />
                <label>Name</label><br>
                <input type="text" name="name" id="name" value="{{ $teacher->name }}" class="form-control"><br>
                <label>Address</label><br>
                <input type="text" name="address" id="address" value="{{ $teacher->address }}"
                    class="form-control"><br>
                <label>Mobile</label><br>
                <input type="text" name="mobile" id="mobile" value="{{ $teacher->mobile }}"
                    class="form-control"><br>
                <input type="submit" value="Update" class="btn btn-success"><br>
            </form>
        </div>
    </div>
@endsection
