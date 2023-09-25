<!DOCTYPE html>
<html>
    <head>
        <title>Teacher Absences</title>
    </head>
    <body>
        <div style="text-align: center;">
            <h1>School Attendance</h1>
            <hr>
            <h2>Teacher: {{ $teacher->name }}</h2>

            <table border="1" cellspacing="0" cellpadding="5" width="100%">
                <thead>
                <tr>
                    <th>Day</th>
                    <th>Date</th>
                    <th>Reason</th>
                </tr>
                </thead>
                <tbody>
                @foreach($absences as $absence)
                    <tr>
                        <td>{{ $absence->day }}</td>
                        <td>{{ $absence->date }}</td>
                        <td>{{ $absence->reason }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <footer style="text-align: right; position: absolute; bottom: 0; right: 0;">
            Date: {{ now()->format('Y-m-d') }}
        </footer>
    </body>
</html>
