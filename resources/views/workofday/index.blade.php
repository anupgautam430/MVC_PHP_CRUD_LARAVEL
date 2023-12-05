<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work_Days index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <h1>Work days in a week </h1>
    <div class="container">
        <div>
            <a href="{{route('workofday.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table class="tbl tbl-1">
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
                    <a class="btn btn-secondary"href="{{route('workofday.edit', ['workofday' => $workd])}}">Edit</a>
                </td>
                <td><a href="#">activate</a>|<a href="#">deactive</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>