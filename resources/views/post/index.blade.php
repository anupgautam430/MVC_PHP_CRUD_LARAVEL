<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="container m-4">
            <a class="btn btn-secondary" href="{{ url('/') }}">home</a>
        </div>
        <h1 class="text-center">Post</h1>
        <div>
            <a class="btn btn-primary" href="{{route('post.create')}}">Add new post</a>
        </div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>


        @endif
        <table class="table">
            <tr class="text-center">
                <th>Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Handle</th>
            </tr>
            @foreach($post as $pro)
            <tr class="text-center">
                <th>{{$pro->name}}</th>
                <th>{{$pro->status}}</th>
                <th>
                    <a class="btn btn-dark" href="{{route('post.edit', ['post' => $pro])}}">Edit</a>
                </th>
                <td><form action="{{ route('post.handle', ['post' => $pro]) }}" method="POST">
                    @csrf
                    @method('post')
                    <button class="btn btn-danger" type="submit" name="action" value="{{ $pro->status == 'active' ? 'deactivate' : 'activate' }}">
                        {{ $pro->status == 'active' ? 'Inactive' : 'Activate' }}
                    </button>

                    </form>
                </td>
                </tr>
                </form>

            @endforeach
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>