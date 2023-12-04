<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
</head>
<body>
    <h1>this is a edit view of visitor</h1>
    <form method="post" action="{{route('visitor.update', ['visitor' => $visitor])}}" >
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
            <input type="text" name="Name"  value="{{$visitor->Name}}">
        </div>
        <div>
            <label>Mobile.no</label>
            <input type="Number" name="Mobile_no" value="{{$visitor->Mobile_no}}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="Email_Address" value="{{$visitor->Email_Address}}">
        </div>
        <div>
            <label>status</label>
            <select name="Status" id="Status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Update Visitor">
        </div>
    </form>
</body>
</html>