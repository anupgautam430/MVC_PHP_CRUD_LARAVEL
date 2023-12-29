<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="controller m-4">
        <a class="btn btn-dark" href="{{url('/')}}">Home</a> <a class="btn btn-dark" href="javascript:history.go(-1)">Back</a>

        <h1 class="text-center">Edit Appointment info</h1>
        <form class="form-control" method="post" action="{{route('appointments.update', ['appointments' => $appointments])}}">
        @csrf
        @method('put')

        @if($errors->any())
        <div class='alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
        </div>
        @endif


{{--        <div class="form-group">--}}
{{--            <label for="officer_id">Officer:</label>--}}
{{--            <select name="officer_id" id="officer_id" class="form-select">--}}
{{--                @foreach($officer as $officerId => $officerName)--}}
{{--                <option value="{{ $officerId }}">{{ $officerName }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="visitor_id">Visitor:</label>--}}
{{--            <select name="visitor_id" id="visitor_id" class="form-select">--}}
{{--                @foreach($visitor as $visitorId => $visitorName)--}}
{{--                    <option value="{{ $visitorId }}">{{ $visitorName }}</option>--}}
{{--                    @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{$appointments->name}}">
        </div>

{{--        <div class="form-group">--}}
{{--            <label>Type</label>--}}
{{--            <input class="form-control" type="text" name="date" value="{{$appointments->type}}" readonly>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label>status</label>--}}
{{--            <input class="form-control" type="text" name="date" value="{{$appointments->status}}" readonly>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label>Date</label>--}}
{{--            <input class="form-control" type="date" name="date" value="{{$appointments->date}}" readonly>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label>Start_time</label>--}}
{{--            <input class="form-control" type="time" name="start_time" value="{{$appointments->start_time}}" readonly>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>End_time</label>--}}
{{--            <input class="form-control" type="time" name="end_time" value="{{$appointments->end_time}}" readonly>--}}
{{--        </div>--}}
        <div class="form-group">
            <label>Added_on</label>
            <input class="form-control" type="text" name="added_on" value="{{$appointments->added_on}}" readonly>
        </div>
        <div class="form-group m-1">
            <input class="btn btn-secondary" type="submit" value="Update Activity">
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
