<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index(){
        $visitor = Visitor::all();
        return view('visitor.index',['visitor'=> $visitor]);
    }

    //create page 
    public function create(){
        return view('visitor.create');
    }

    
    //store  in database and redirect to index
    public function store(Request $requests)
    {
        
        $data = $requests->validate([
            'Name' => 'required',
            'Mobile_no'=>'required',
            'Email_Address'=>'required',
            'Status' => 'required|in:active',
        ]);

        $newVisitor = Visitor::create($data);
        return redirect(route('visitor.index'));        
    }

        //this access the edit page
        public function edit(Visitor $visitor)
        {
            return view('visitor.edit', ['visitor'=> $visitor]);
        }

        public function update(Visitor $visitor, Request $request){
            $data = $request->validate([
                'Name' => 'required',
                'Mobile_no'=>'required',
                'Email_Address'=>'required',
                'Status' => 'required|in:active',
            ]);

            $visitor->update($data);

            return redirect(route('visitor.index'))->with('success', 'Visitor updated successfully');
        }
}
