<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officer;
use App\Models\Post;

class OfficerController extends Controller
{
    public function index(){
        $officer = Officer::all();
        return view('officer.index',['officer'=> $officer]);
    }

    public function create()
    {
        $post = Post::pluck('name', 'id');
        return view('officer.create', compact('post'));
    }

    //store the officer details in database
    public function store(Request $request)
    {
        
        $data = $this->validateOfficer($request);

        $newOfficer = Officer::create($data);
        return redirect(route('officer.index'));       
    }

    public function edit(Officer $officer)
        {
            $post = Post::pluck('name', 'id');
            return view('officer.edit', ['officer'=> $officer],compact('post'));
        }

        public function update(Officer $officer, Request $request){
            $data = $this->validateOfficer($request);

            $officer->update($data);

            return redirect(route('officer.index'))->with('success', 'Officer updated successfully');
        }

    ///function of validation
    private function validateOfficer(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:active',
            'work_start_time' => 'required|date_format:H:i',
            'work_end_time' => 'required|date_format:H:i|after:work_start_time',
            'post_id' => 'required|exists:posts,id'
        ]);
    }
}
