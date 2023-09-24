<!DOCTYPE html>
<html>
<head>
    <title>Student Absences</title>
</head>
<body>
<h1 style="text-align: center;">School Management</h1>
<hr>
<h2>Student: {{ $students->name }}</h2>

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
</body>
</html>
