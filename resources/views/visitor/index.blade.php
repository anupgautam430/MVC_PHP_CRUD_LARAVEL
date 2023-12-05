<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <h1>Visitor</h1>
    <div>
        <div>
            <a href="{{route('visitor.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Mpbile_no</th>
                <th>Email_Address</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Handle</th>
            </tr>
            @foreach($visitor as $visit)
            <tr>
                <th>{{$visit->Name}}</th>
                <th>{{$visit->Mobile_no}}</th>
                <th>{{$visit->Email_Address}}</th>
                <th>{{$visit->Status}}</th>
                <th>
                    <a href="{{route('visitor.edit', ['visitor' => $visit])}}">Edit</a>
                </th>
                <td><a href="#">activate</a>|<a href="#">deactive</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>