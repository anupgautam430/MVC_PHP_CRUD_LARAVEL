<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor</title>
</head>
<body>
    <h1>Visitor</h1>
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
                <th>Status</th>
                <th>Work_Start</th>
                <th>Work_End</th>
            </tr>
            @foreach($officer as $office)
            <tr>
                <th>{{$office->name}}</th>
                <th>{{$office->post->name}}</th>
                <th>{{$office->work_start_time}}</th>
                <th>{{$office->work_end_time}}</th>
                <th>
                    <a href="{{route('officer.edit', ['officer' => $office])}}">Edit</a>
                </th>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>