<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container m-4">
        <a class="btn btn-dark" href="{{ url('/') }}">Home</a>
    </div>
    <div class="container">
        <h1 class="text-center">Activity list</h1>
        <div>
            <a class="btn btn-primary" href="{{route('activities.create')}}">Add New Activity</a>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($activities->isEmpty())
         <p>No Activities available.</p>
        @else
        <table class="table">
            <tr>
                <th class="text-center">Activity Id</th>
                <th class="text-center">Officer name</th>
                <th class="text-center">Start Date</th>
                <th class="text-center">End Date</th>
                <th class="text-center">Start Time</th>
                <th class="text-center">End Time</th>
                <th class="text-center">Type</th>
                <th class="text-center">Status</th>
{{--                <th class="text-center">Action</th>--}}
            </tr>
            @foreach($activities as $active)
            <tr>
                <td class="text-center">{{$active->ActivityId}}</td>
                <td class="text-center">{{$active->officer->name}}</td>
                <td class="text-center">{{$active->Start_Date}}</td>
                <td class="text-center">{{$active->End_Date}}</td>
                <td class="text-center">{{$active->Start_Time}}</td>
                <td class="text-center">{{$active->End_Time}}</td>
                <td class="text-center">{{$active->Type}}</td>
                <td class="text-center">{{$active->Status}}</td>
{{--                <td class="text-center">--}}
{{--                    <form action="{{ route('activities.cancel', ['activities' => $active->ActivityId]) }}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <button type="submit" class="btn {{$active->Status=='Active'  ?  'btn-danger' : 'btn-success'}}">--}}
{{--                            {{ $active->Status == 'Cancelled' ? 'Activate' : 'Cancel' }}--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </td>td--}}
            </tr>
            @endforeach

        </table>
        @endif
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
