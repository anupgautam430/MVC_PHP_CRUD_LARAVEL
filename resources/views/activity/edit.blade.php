<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <h1>this is a create view of Activity</h1>
    <form method="post" action="{{route('activity.update', ['activity' => $activity])}}">
        @csrf
        @method('put')

        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        

        <div class="form-group">
            <label for="officer_id">Officer:</label>
            <select name="officer_id" id="officer_id" class="form-control">
                @foreach($officer as $officerId => $officerName)
                    <option value="{{ $officerId }}">{{ $officerName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="visitor_id">Visitor:</label>
            <select name="visitor_id" id="visitor_id" class="form-control">
                @foreach($visitor as $visitorId => $visitorName)
                    <option value="{{ $visitorId }}">{{ $visitorName }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{$activity->name}}">
        </div>

        <div>
            <label>Type</label>
            <select name="type" id="type" value="{{$activity->type}}">
                <option value="leave">Leave</option>
                <option value="appointment">Appointment</option>
                <option value="break">break</option>
            </select>
        </div>

        <div>
            <label>status</label>
            <select name="status" id="status" value="{{$activity->status}}">
                <option value="active">Active</option>
                <option value="cancel">Cancelled</option>
                <option value="deactivated">Deactivated</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div>
            <label>Date</label>
            <input type="date" name="date" value="{{$activity->date}}">
        </div>
        
        <div>
            <label>Start_time</label>
            <input type="time" name="start_time" value="{{$activity->start_time}}">
        </div>
        <div>
            <label>End_time</label>
            <input type="time" name="end_time" value="{{$activity->end_time}}">
        </div>
        <div>
            <label>Added_on</label>
            <input type="date" name="added_on" value="{{$activity->added_on}}">
        </div>
        <div>
            <input type="submit" value="Update Activity">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>