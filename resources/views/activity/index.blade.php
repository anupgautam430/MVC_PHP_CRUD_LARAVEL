<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity index</title>
</head>
<body>
    <h1>Activity</h1>
    <div>
        <div>
            <a href="{{route('activity.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table border="1">
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
                    <a href="{{route('activity.edit', ['activity' => $active])}}">Edit</a>
                </td>
                <td><a href="#">activate</a>|<a href="#">deactive</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>