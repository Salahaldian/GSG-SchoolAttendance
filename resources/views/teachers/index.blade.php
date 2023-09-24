@extends('layout')
@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h2>Teachers</h2>
            </div>
            <div class="card-body">
                <a href="{{ route('courses.teachers.create', $course->id) }}" class="btn btn-success btn-sm" title="Add New Student">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Teacher
                </a>
                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>
                                    <a href="{{ route('courses.teachers.show', [$course->id, $item->id]) }}" title="View Teacher"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    <a href="{{ route('courses.teachers.edit', [$course->id, $item->id]) }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    <a href="{{ route('courses.teachers.absences.index', [$course->id, $item->id]) }}" title="View Absences"><button class="btn btn-success btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Absences</button></a>
                                    <form method="POST" action="{{ route('courses.teachers.destroy', [$course->id, $item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
