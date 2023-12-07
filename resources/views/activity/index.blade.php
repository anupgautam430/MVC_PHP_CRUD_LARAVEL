<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container m-4">
            <a class="btn btn-dark" href="{{ url('/') }}">home</a>
        <h1 class="text-center">Activity</h1>
        <div>
            <a class="btn btn-primary" href="{{route('activity.create')}}">Add new activity</a>
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
        <form method="GET" action="{{ route('activity.index') }}" class="mb-3">
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
                <th>Officer</th>
                <th>Visitor</th>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Date</th>
                <th>Start_time</th>
                <th>End_time</th>
                <th>Added_on</th>
                <th>Edit</th>
                <th>Handel</th>
            </tr>
            @foreach($activity as $active)
            <tr>
                <td>{{$active->officer->name}}</td>
                <td>{{$active->visitor->Name}}</td>

                <td>{{$active->name}}</td>
                <td>{{$active->type}}</td>
                <td>{{ $active->status}}</td>
                <td>{{$active->date}}</td>
                <td>{{$active->start_time}}</td>
                <td>{{$active->end_time}}</td>
                <td>{{$active->added_on}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('activity.edit', ['activity' => $active])}}">Edit</a>
                </td>
                <td><form action="{{ route('activity.cancel', ['activity' => $active]) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger">
                    {{ $active->status == 'Cancelled' ? 'Activate' : 'Cancel' }}
                </button>
            </form></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>