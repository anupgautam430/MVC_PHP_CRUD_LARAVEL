<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>workofday</title>
</head>
<body>
    <h1>Edit work of days in a week of officer</h1>
    <form method="post" action="{{route('workofday.update', ['workofday' => $workofday->id])}}">
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
            <label for="officer_id">Post:</label>
            <select name="officer_id" id="officer_id" class="form-control">
                @foreach($officer as $workId => $workName)
                    <option value="{{ $workId }}">{{ $workName }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Work </label>
            <input type="text" name="day_of_week" value="{{$workofday->day_of_week}}">
        </div>
        <div>
            <input type="submit" value="update Visitor">
        </div>
    </form>
</body>
</html>