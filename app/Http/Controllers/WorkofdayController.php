<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkDays;
use App\Models\Officer;

class WorkofdayController extends Controller
{
    public function index(){
        $workday = WorkDays::all();
        return view('workofday.index',['workday'=> $workday]);
        
    }

    public function create()
    {
        $officer = Officer::pluck('name', 'id');
        return view('workofday.create', compact('officer'));
    }

    //storing workofday
    public function store(Request $request)
    {
        
        $data = $this->validateWork($request);

        $newday = WorkDays::create($data);
        return redirect(route('workofday.index'));       
    }

     //accessing data in edit view
    public function edit(WorkDays $workofday)
        {
            $officer = Officer::pluck('name', 'id');
            return view('workofday.edit', ['workofday'=> $workofday],compact('officer'));
        }

        //update
        public function update(WorkDays $workofday, Request $request){
            $data = $this->validateWork($request);

            $workofday->update($data);

            return redirect(route('workofday.index'))->with('success', 'Work day updated successfully');
        }

        private function validateWork(Request $request)
    {
        return $request->validate([
            'day_of_week' => 'required|integer|between:1,7',
            'officer_id' => 'required|exists:officers,id'
        ]);
    }
}
