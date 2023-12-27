<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work_Days index</title>
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

        <h1 class="text-center">Work days of a officer in a week </h1>
        <div>
            <a class="btn btn-primary" href="{{route('workofday.create')}}">Add new data</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table class="table">
            <tr class="text-center">
                <th>Officer Name</th>
                <th>Work Day Of Week</th>
                <th>Edit</th>

            </tr>
            @foreach($workday as $workd)
            <tr class="text-center">
                <td>{{$workd->officer->name}}</td>
                <td>{{$workd->day_of_week}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('workofday.edit', ['workofday' => $workd])}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>