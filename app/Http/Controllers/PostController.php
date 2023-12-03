<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('post.index',['post'=> $post]);
    }

    // view create
    public function create(){
        return view('post.create');
    }

//store  in database and redirect to index
    public function store(Request $request){
       
            $data = $request->validate([
                'name' => 'required',
                'status' => 'required|in:active',
            ]);
    
            $newPost = Post::create($data);
    
            return redirect(route('post.index'));        
    }

    //edit the data
    public function edit(Post $post) {
        return view('post.edit', ['post'=> $post]);
    }

    public function update(Post $post, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required|in:active',
        ]);

        $post->update($data);

        return redirect(route('post.index'))->with('success', 'Post updated successfully');
    }
}
