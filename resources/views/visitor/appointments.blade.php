<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container m-4">
    <a class="btn btn-dark" href="javascript:history.go(-1)">Back</a>
    @if($appointments->isEmpty())
        <h1 class="lead text-center">No appointments found.</h1>
    @else
    
    <h1>Appointments of: {{ $visitor->Name }}</h1>

    <table class="table">
        <tr class="text-center">
            <th>Officer</th>
            <th>Officer Status</th>
            <th>Visitor Status</th>
            <th>Appointment Time</th>
        </tr>
        @foreach($appointments as $appointment)
            <tr class="text-center">
                <td>{{ $appointment->officer->name }}</td>
                <td>{{ $appointment->officer->status }}</td>
                <td>{{ $appointment->visitor->Status }}</td>
                <td>{{ $appointment->appointment_time }}</td>
            </tr>
        @endforeach
    </table>
    @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>