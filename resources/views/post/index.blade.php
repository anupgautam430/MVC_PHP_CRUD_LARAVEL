<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
<div class="container m-2">
        <a class="btn btn-dark" href="{{ url('/') }}">home</a>
</div>
<div class="container">
    <h1 class="text-center">Post</h1>
    <a class="btn btn-primary" href="{{route('post.create')}}">Add new post</a>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table">
            <tr class="text-center">
                <th>Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Action</th>
            </tr>
            @foreach($post as $pro)
            <tr class="text-center">
                <td>{{$pro->name}}</td>
                <td>{{$pro->status}}</td>
                <td>
                    <a class="btn btn-dark" href="{{route('post.edit', ['post' => $pro])}}">Edit</a>
                </td>
                <td><form action="{{ route('post.handle', ['post' => $pro]) }}" method="POST">
                    @csrf
                    @method('post')
                    <button class="btn {{ $pro->status == 'active' ? 'btn-danger' : 'btn-success' }}" type="submit" name="action" value="{{ $pro->status == 'active' ? 'deactivate' : 'activate' }}">
                        {{ $pro->status == 'active' ? 'Deactivate' : 'Activate' }}
                    </button>


                    </form>
                </td>
                </tr>
                </form>

            @endforeach
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
