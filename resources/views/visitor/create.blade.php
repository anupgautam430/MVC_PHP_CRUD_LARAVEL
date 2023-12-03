<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
</head>
<body>
    <h1>this is a create view of visitor</h1>
    <form method="post" action="{{route('visitor.store')}}" >
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
            <label>Mobile.no</label>
            <input type="Number" name="mobile" placeholder="Enter Phone number">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email Address">
        </div>
        <div>
            <label>status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Add Visitor">
        </div>
    </form>
</body>
</html>