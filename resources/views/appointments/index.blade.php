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
            <a class="btn btn-dark" href="{{ url('/') }}">home</a>
    </div>
    <div class="container">
        <h1 class="text-center">Appointment</h1>
        <div>
            <a class="btn btn-primary" href="{{route('appointments.create')}}">Add new appointment</a>
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
        <form method="GET" action="{{ route('appointments.index') }}" class="mb-3">
    <div class="input-group">
        <select name="search_by" class="form-select">
            <option value="name" {{ $searchBy === 'name' ? 'selected' : '' }}>Name</option>
            <option value="type" {{ $searchBy === 'type' ? 'selected' : '' }}>Type</option>
            <option value="status" {{ $searchBy === 'status' ? 'selected' : '' }}>Status</option>
            <option value="Date" {{ $searchBy === 'Date' ? 'selected' : '' }}>Date</option>
        </select>
        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ $search }}">
        <button type="submit" class="btn btn-outline-secondary">Search</button>
    </div>
</form>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Visitor</th>
                <th>Officer</th>
                <th>Status</th>
                <th>Type</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Added On</th>
                <th>Edit</th>
                <th>Action</th>
            </tr>
            @foreach($appointments as $appoint)
            <tr>
                <td>{{$appoint->name}}</td>
                <td>{{$appoint->visitor->Name}}</td>
                <td>{{$appoint->officer->name}}</td>
                <td>{{ $appoint->status}}</td>
                <td>{{$appoint->type}}</td>
                <td>{{$appoint->date}}</td>
                <td>{{$appoint->start_time}}</td>
                <td>{{$appoint->end_time}}</td>
                <td>{{$appoint->added_on}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('appointments.edit', ['appointments' => $appoint])}}">Edit</a>
                </td>
                <td><form action="{{ route('appointments.cancel', ['appointments' => $appoint]) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn {{$appoint->status=='Active'  ?  'btn-danger' : 'btn-success'}}">
                    {{ $appoint->status == 'Cancelled' ? 'Activate' : 'Cancel' }}
                </button>
            </form></td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
