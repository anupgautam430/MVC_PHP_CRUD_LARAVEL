<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <h1>this is a edit view of officer</h1>
    <form method="post" action="{{route('officer.update', ['officer' => $officer])}}" >
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
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{$officer->name}}">
        </div>

        <div class="form-group">
            <label for="post_id">Post:</label>
            <select name="post_id" id="post_id" class="form-control">
                @foreach($post as $postId => $postName)
                    <option value="{{ $postId }}">{{ $postName }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <label>Work_start_time</label>
            <input type="time" name="work_start_time" value="$officer->work_start_time">
        </div>
        <div>
            <label>Work_end_time</label>
            <input type="time" name="work_end_time" value="$officer->work_end_time">
        </div>
        <div>
            <input type="submit" value="Update Officer">
        </div>
        <div>
        <a href="{{ route('workofday.edit', ['workofday' => $officer->id]) }}">Edit workdays</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>