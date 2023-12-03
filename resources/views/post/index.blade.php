<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Post</h1>
    <div>
        <div>
            <a href="{{route('post.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Handle</th>
            </tr>
            @foreach($post as $pro)
            <tr>
                <th>{{$pro->name}}</th>
                <th>{{$pro->status}}</th>
                <th>
                    <a href="{{route('post.edit', ['post' => $pro])}}">Edit</a>
                </th>
            </tr>

            @endforeach
        </table>
    </div>
</body>
</html>