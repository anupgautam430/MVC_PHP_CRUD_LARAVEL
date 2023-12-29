<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container m-4">
        <a class="btn btn-dark" href="{{url('/')}}">Home</a> <a class="btn btn-dark" href="javascript:history.go(-1)">Back</a>
    </div>
    <div class="container">
    <h1 class="text-center">Create new appointment</h1>
    <form class="form-control" method="post" action="{{route('appointments.store')}}">
        @csrf
        @method('post')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>



        <div class="form-group">
            <label for="officer_id">Officer:</label>
            <select name="officer_id" id="officer_id" class="form-select">
                <option value="#">--Select Officer--</option>
            @foreach($officer as $officerId => $officerName)
                    <option value="{{ $officerId }}">{{ $officerName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="visitor_id">Visitor:</label>
            <select name="visitor_id" id="visitor_id" class="form-select">
                <option value="#">--Select Visitor--</option>
            @foreach($visitor as $visitorId => $visitorName)
                    <option value="{{ $visitorId }}">{{ $visitorName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter activity name">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-select" name="type">
                <option value="#">--select type--</option>
                <option value="Appointment">Appointment</option>
                <option value="Break">Break</option>
                <option value="Leave">Leave</option>
            </select>
        </div>

{{--        <div class="form-group">--}}
{{--            <label>status</label>--}}
{{--            <select class="form-select" name="status" id="status">--}}
{{--                <option value="active">Active</option>--}}
{{--                <option value="cancel">Cancelled</option>--}}
{{--                <option value="deactivated">Deactivated</option>--}}
{{--                <option value="completed">Completed</option>--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="form-group">
            <label>Date</label>
            <input class="form-control" type="date" name="date" placeholder="Enter date">
        </div>

        <div class="form-group">
            <label>Start_time</label>
            <input class="form-control" type="time" name="start_time" placeholder="start time">
        </div>
        <div class="form-group">
            <label>End_time</label>
            <input class="form-control" type="time" name="end_time" placeholder="end time">
        </div>
        <div class="form-group">
            <label>Added_on</label>
            <input class="form-control" type="date" name="added_on" value="{{ now()->format('Y-m-d') }}" readonly>
        </div>
        <div class="form-group m-1">
            <input class=" form-control btn btn-primary" type="submit" value="Add Activity">
        </div>
    </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
