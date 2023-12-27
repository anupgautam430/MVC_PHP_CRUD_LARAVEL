@extends('layout.global')

@section('controllerName', 'Post Controller')

@section('content')
    <div class="container m-4">
    <a class="btn btn-dark" href="{{url('/')}}">Home</a> <a class="btn btn-dark" href="javascript:history.go(-1)">Back</a>         
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
            <select name="status" id="status" class="form-select">
                <option value="active">Active</option>
                <option value="inactive">Inavtive</option>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary m-1" type="submit" value="Add Post">
        </div>
    </form>
</div>
@endsection