<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>workofday</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container m-4">
    <a class="btn btn-dark" href="{{url('/')}}">Home</a> <a class="btn btn-dark" href="javascript: history.go(-1)">Back</a>
        <h1 class="text-center">Edit work of days in a week of officer</h1>
        <form class="form-control" method="post" action="{{route('workofday.update', ['workofday' => $workofday->id])}}">
            @csrf
            @method('put')

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="officer_id">Officer:</label>
                <select name="officer_id" id="officer_id" class="form-select">
                    @foreach($officer as $workId => $workName)
                    <option value="{{ $workId }}">{{ $workName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Work Days: </label>
            <input class="form-control" type="text" name="day_of_week" value="{{$workofday->day_of_week}}">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="update Visitor">
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
