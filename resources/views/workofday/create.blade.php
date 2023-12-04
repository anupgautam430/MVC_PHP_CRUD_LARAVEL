<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add work of day for officer</title>
</head>
<body>
    <h1>Add work of days in a week of officer</h1>
    <form method="post" action="{{route('workofday.store')}}">
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
            <label for="officer_id">Post:</label>
            <select name="officer_id" id="officer_id" class="form-control">
                @foreach($officer as $workId => $workName)
                    <option value="{{ $workId }}">{{ $workName }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Work </label>
            <input type="text" name="day_of_week" placeholder="Add days">
        </div>
        <div>
            <input type="submit" value="Add Visitor">
        </div>
    </form>
</body>
</html>