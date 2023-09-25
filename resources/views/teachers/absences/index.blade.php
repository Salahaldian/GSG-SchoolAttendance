@extends('layout')
@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h2>Teacher Absences</h2>
            </div>
            <div class="card-body">
                <a href="{{ route('courses.teachers.absences.create', [$course->id, $teacher->id]) }}" class="btn btn-success btn-sm" title="Add New Absence">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Absence
                </a>
                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Reason</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($absences as $absence)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absence->date }}</td>
                                <td>{{ $absence->day }}</td>
                                <td>{{ $absence->reason }}</td>
                                <td>
                                    <a href="{{ route('courses.teachers.absences.edit', [$course->id, $teacher->id, $absence->id]) }}" title="Edit Absence"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    <form method="POST" action="{{ route('courses.teachers.absences.destroy', [$course->id, $teacher->id, $absence->id]) }}" accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Absence" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        <a href="{{ route('generate-pdf-teacher', [$course->id, $teacher->id]) }}" class="btn btn-primary" target="_blank">Download PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
