<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index(){
        return view('visitor.index');
    }

    //create page 
    public function create(){
        return view('visitor.create');
    }

    
    //store  in database and redirect to index
    public function store(Request $request){
        
        $data = $request->validate([
            'Name' => 'required',
            'Mobile_no'=>'required',
            'Email_Address'=>'required',
            'Status' => 'required|in:active',
        ]);

        $newVisitor = Visitor::create($data);
        return redirect(route('visitor.index'));        
        }
}
