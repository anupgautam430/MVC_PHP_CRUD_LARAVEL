<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
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
    <h1 class="text-center">Create Activities</h1>

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


    <form  class="form-control" method="post" action="{{ route('activities.store') }}">
        @csrf

{{--        <div class="form-group">--}}
{{--            <label for="visitor_id">Select Visitor:</label>--}}
{{--            <select class="form-select" name="visitor_id">--}}
{{--                <option value="#">--Select Visitor--</option>--}}
{{--            @foreach($visitors as $visitor)--}}
{{--                <option value="{{ $visitor->id }}">{{ $visitor->Name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div >--}}
        <div label for="officer_id" class="form-group">Select Officer:</label>
            <select class="form-select" name="officer_id">
                <option value="#">--Select Officer--</option>
            @foreach($officers as $officer)
                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Type">Type</label>
            <select class="form-select" name="Type">
                <option value="#">--select type--</option>
                <option value="Break">Break</option>
                <option value="Leave">Leave</option>
            </select>
        </div>


{{--        <div class="form-group">--}}
{{--            <label>Status</label>--}}
{{--            <select class="form-select" name="Status" id="Status">--}}
{{--                <option value="#">--select type--</option>--}}
{{--                <option value="Active">Active</option>--}}
{{--                <option value="Cancelled">Cancelled</option>--}}
{{--                <option value="deactivated">Deactivated</option>--}}
{{--                <option value="completed">Completed</option>--}}
{{--            </select>--}}
{{--        </div>--}}
        <div class="form-group">
            <label>Start Date</label>
            <input class="form-control" type="date" name="Start_Date" placeholder="Enter start date">
        </div>
        <div class="form-group">
            <label>Start Time</label>
            <input class="form-control" type="time" name="Start_Time" placeholder="Enter start time">
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input class="form-control" type="date" name="End_Date" placeholder="Enter end date">
        </div>
        <div class="form-group">
            <label>End Time</label>
            <input class="form-control" type="time" name="End_Time" placeholder="Enter end time">
        </div>
{{--        <div class="form-group m-1">--}}
{{--            <label for="appointment_time">Select Appointment Time:</label>--}}
{{--            <input class="form-control" type="datetime-local" name="appointment_time" value="#" required>--}}
{{--        </div>--}}

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
