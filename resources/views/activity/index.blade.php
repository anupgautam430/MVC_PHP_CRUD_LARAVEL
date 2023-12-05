<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="container m-4">
            <a class="btn btn-secondary" href="{{ url('/') }}">home</a>
        </div>
        <h1 class="text-center">Activity</h1>
        <div>
            <a class="btn btn-primary" href="{{route('activity.create')}}">Add new activity</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
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
                <td>{{$active->visitor->name}}</td>
                <td>{{$active->name}}</td>
                <td>{{$active->type}}</td>
                <td>{{$active->status}}</td>
                <td>{{$active->date}}</td>
                <td>{{$active->start_time}}</td>
                <td>{{$active->end_time}}</td>
                <td>{{$active->added_on}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('activity.edit', ['activity' => $active])}}">Edit</a>
                </td>
                <td><a href="#">activate</a>|<a href="#">deactive</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>