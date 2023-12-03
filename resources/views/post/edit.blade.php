<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
</head>
<body>
    <h1>Edit the data</h1>
    <form method="POST" action="{{route('posts.update', ['post' => $post])}}">
        @csrf
        @method('PUT')

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
            <input type="text" name="name" placeholder="{{$post->name}}">
        </div>
        <div>
            <label>status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inavtive</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>