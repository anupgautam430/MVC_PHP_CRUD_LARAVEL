<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
</head>
<body>
    <h1>this is a create view</h1>
    <form method="post" action="{{route('post.store')}}" >
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
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Post">
        </div>
        <div>
            <label>status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inavtive</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Add Post">
        </div>
    </form>
</body>
</html>