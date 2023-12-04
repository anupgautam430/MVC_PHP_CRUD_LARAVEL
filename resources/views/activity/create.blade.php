<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Activity</title>
</head>
<body>
    <h1>this is a create view of Activity</h1>
    <form method="post" action="{{route('activity.store')}}">
        @csrf
        @method('post')

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
            <input type="text" name="name" placeholder="Enter activity name">
        </div>

        <div>
            <label>Type</label>
            <select name="type" id="type">
                <option value="leave">Leave</option>
                <option value="appointment">Appointment</option>
                <option value="break">break</option>
            </select>
        </div>

        <div>
            <label>status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="cancel">Cancelled</option>
                <option value="deactivated">Deactivated</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div>
            <label>Date</label>
            <input type="date" name="date" placeholder="Enter date">
        </div>
        
        <div>
            <label>Start_time</label>
            <input type="time" name="start_time" placeholder="start time">
        </div>
        <div>
            <label>End_time</label>
            <input type="time" name="end_time" placeholder="end time">
        </div>
        <div>
            <label>Added_on</label>
            <input type="date" name="added_on" placeholder="added date">
        </div>
        <div>
            <input type="submit" value="Add Activity">
        </div>
    </form>
</body>
</html>