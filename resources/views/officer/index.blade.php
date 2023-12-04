<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer index</title>
</head>
<body>
    <h1>Officer</h1>
    <div>
        <div>
            <a href="{{route('officer.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Post</th>
                <th>Work_Start</th>
                <th>Work_End</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Handel</th>

            </tr>
            @foreach($officer as $office)
            <tr>
                <td>{{$office->name}}</td>
                <td>{{$office->post->name}}</td>
                <td>{{$office->work_start_time}}</td>
                <td>{{$office->work_end_time}}</td>
                <td>{{$office->status}}</td>
                <td>
                    <a href="{{route('officer.edit', ['officer' => $office])}}">Edit</a>
                </td>
                <td><a href="#">activate</a>|<a href="#">deactive</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>