<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container m-4">
        <a class="btn btn-secondary" href="{{ url('/') }}">home</a>
    </div>
    <div class="container">
        <h1>Apointments list</h1>
        <div>
            <a class="btn btn-primary" href="{{route('appointments.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif

        @if($appointments->isEmpty())
         <p>No appointments available.</p>
        @else
        <table class="table">
            <tr>
                <th class="text-center">Visitor name</th>
                <th class="text-center">Officer name</th>
                <th class="text-center">Time</th>
                <th class="text-center">Status</th>
            </tr>
            @foreach($appointments as $appoint)
            <tr>
                <td class="text-center">{{$appoint->visitor->name}}</td>
                <td class="text-center">{{$appoint->officer->name}}</td>
                <td class="text-center">{{$appoint->appointment_time}}</td>
                <td class="text-center">{{$appoint->status}}</td>


            </tr>
            @endforeach
   
        </table>
        @endif
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>