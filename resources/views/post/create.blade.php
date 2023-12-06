<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container m-4">
    <a class="btn btn-dark" href="javascript:history.go(-1)">Go Back</a>
        <h1 class="text-center">Add a new Post</h1>
        <form class="form-control" method="post" action="{{route('post.store')}}" >
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
            <label>Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter Post">
        </div>
        <div class="form-group">
            <label>status</label>
            <select name="status" id="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inavtive</option>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary m-1" type="submit" value="Add Post">
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>