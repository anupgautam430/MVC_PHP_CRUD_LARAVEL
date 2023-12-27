<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <div class="container m-4">
    <a class="btn btn-dark" href="{{url('/')}}">Home</a> <a class="btn btn-dark" href="javascript:history.go(-1)">Back</a>         
    <h1>Add new Visitor</h1>
        <form class="form-control" method="post" action="{{route('visitor.store')}}" >
            @csrf
            @method('post')
            
        <div class="form-group">
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
            <input class="form-control" type="text" name="Name" placeholder="Enter Post">
        </div>
        <div class="form-group">
            <label>Mobile.no</label>
            <input class="form-control" type="Number" name="Mobile_no" placeholder="Enter Phone number">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="Email_Address" placeholder="Enter Email Address">
        </div>
        <div class="form-group">
            <label>status</label>
            <select class="form-select" name="Status" id="Status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <input class="btn btn-primary m-1" type="submit" value="Add Visitor">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>

</body>
</html>