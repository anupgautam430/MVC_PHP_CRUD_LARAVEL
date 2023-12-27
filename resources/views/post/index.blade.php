@extends('layout.global')

@section('controllerName', 'Post')

@section('content')
<div class="container m-2">
        <a class="btn btn-dark" href="{{ url('/') }}">home</a>
        <div>
            <a class="btn btn-primary" href="{{route('post.create')}}">Add new post</a>
        </div>
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
    @endsection