<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container m-4">
    <a class="btn btn-dark" href="{{ url('/') }}">home</a>
        <h1 class="text-center">Officer Information</h1>
        <div>
            <a class="btn  btn-primary" href="{{route('officer.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table">
            <tr class="text-center">
                <th>Name</th>
                <th>Post</th>
                <th>Work_Start</th>
                <th>Work_End</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Handel</th>
            </tr>
            @foreach($officer as $office)
            <tr class="text-center">
                <td>{{$office->name}}</td>
                <td>{{$office->post->name}}</td>
                <td>{{$office->work_start_time}}</td>
                <td>{{$office->work_end_time}}</td>
                <td>{{$office->status}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('officer.edit', ['officer' => $office])}}">Edit</a>
                    <a class="btn btn-info" href="{{ route('officer.appointments', ['officer' => $office]) }}" class="btn btn-info">View Appointments</a>
                </td>
                <td><form action="{{ route('officer.handle', ['officer' => $office]) }}" method="post">
                     @csrf
                            <button class="btn btn-danger" type="submit" name="action" value="{{ $office->status == 'active' ? 'deactivate' : 'activate' }}">
                             {{ $office->Status == 'active' ? 'Deactivate' : 'Activate' }}
                             </button>
                    </form></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>