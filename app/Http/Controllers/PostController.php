<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Officer;



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

    //handle the activate and deactivate (2.a: If any Officer of given post is active, user should not be able to deactivate the Post.)
    public function handle(Post $post)
    {
        // Check if any active officer is associated with the post
        $activeOfficers = Officer::where('post_id', $post->id)
                                ->where('status', 'active')
                                ->exists();

        // If any active officer is found, prevent deactivation
        if ($post->status === 'active' && $activeOfficers) {
            return redirect(route('post.index'))->with('error', 'Cannot activate post. Active officer found.');
        }

        // this section handle the status
        $newStatus = $post->status === 'active' ? 'inactive' : 'active';
        $post->update(['status' => $newStatus]);

        return redirect(route('post.index'))->with('success', 'Post status handled successfully');
    }
}
