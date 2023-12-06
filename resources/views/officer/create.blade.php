<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create officer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container m-4">
        <a class="btn btn-dark" href="javascript:history.go(-1)">Back</a>

        <h1 class="text-center">Create New Officer</h1>
        <form class="form-control" method="post" action="{{route('officer.store')}}">
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
                <label for="post_id">Post:</label>
                <select name="post_id" id="post_id" class="form-control">
                    @foreach($post as $postId => $postName)
                    <option value="{{ $postId }}">{{ $postName }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>status</label>
                <select class="form-control" name="status" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label>Work_start_time</label>
                <input class="form-control" type="time" name="work_start_time" placeholder="start time">
            </div>
            <div class="form-group">
                <label>Work_end_time</label>
                <input  class="form-control" type="time" name="work_end_time" placeholder="start time">
            </div>
            <div class="form-group m-1">
                <input class="form-control btn btn-primary" type="submit" value="Add Visitor">
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
        
    </body>
    </html>