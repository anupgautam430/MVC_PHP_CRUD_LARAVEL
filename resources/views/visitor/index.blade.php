<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container m-4">
        <a class="btn btn-dark" href="{{url('/')}}">Home</a>
    </div>
    <div class="container">
        <h1 class="text-center">Visitor</h1>
            <a class="btn btn-primary" href="{{route('visitor.create')}}">Add new Visitor</a>

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
        <table class="table">
            <tr class="text-center">
                <th>Name</th>
                <th>Mobile no</th>
                <th>Email Address</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Action</th>
            </tr>
            @foreach($visitor as $visit)
            <tr class="text-center">
                <td>{{$visit->Name}}</td>
                <td>{{$visit->Mobile_no}}</td>
                <td>{{$visit->Email_Address}}</td>
                <td>{{$visit->Status}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('visitor.edit', ['visitor' => $visit])}}">Edit</a>
                    <a class="btn btn-info" href="{{ route('visitor.appointments', ['visitor' => $visit]) }}" class="btn btn-info">View Appointments</a>

                </td>
                <td>
                    <form action="{{ route('visitor.handle', ['visitor' => $visit]) }}" method="post">
                     @csrf
                            <button class="btn {{$visit->Status == 'active' ? 'btn-danger' : 'btn-success'}}" type="submit" name="action" value="{{ $visit->Status == 'active' ? 'deactivate' : 'activate' }}">
                             {{ $visit->Status == 'active' ? 'Deactivate' : 'Activate' }}
                             </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
