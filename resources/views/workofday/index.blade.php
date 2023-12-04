<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work_Days index</title>
</head>
<body>
    <h1>Work days in a week </h1>
    <div>
        <div>
            <a href="{{route('workofday.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table border="1">
            <tr>
                <th>Officer Name</th>
                <th>Work Day Of Week</th>
                <th>Edit</th>
                <th>Handel</th>

            </tr>
            @foreach($workday as $workd)
            <tr>
                <td>{{$workd->officer->name}}</td>
                <td>{{$workd->day_of_week}}</td>
                <td>
                    <a href="{{route('workofday.edit', ['workofday' => $workd])}}">Edit</a>
                </td>
                <td><a href="#">activate</a>|<a href="#">deactive</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>