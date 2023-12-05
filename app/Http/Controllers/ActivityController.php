<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Officer;
use App\Models\Visitor;

class ActivityController extends Controller
{
    public function index(){
        $activity = Activity::all();
        return view('activity.index',['activity'=> $activity]);
    }

    public function create()
    {
        $officer = Officer::pluck('name', 'id');
        $visitor = Visitor::pluck('name', 'id');
        
        return view('activity.create', compact('officer','visitor'));
    }

    //storing workofday
    public function store(Request $request)
    {
        
        $data = $this->validateActivity($request);

        $newActivity = Activity::create($data);
        return redirect(route('activity.index'));       
    }

     //accessing data in edit view
    public function edit(Activity $activity)
    {
        $officer = Officer::pluck('name', 'id');
        $visitor = Visitor::pluck('name', 'id');
        return view('activity.edit', compact('activity', 'officer', 'visitor'));
    }

        //update
        public function update(Activity $activity, Request $request){
            $data = $this->validateActivity($request);

            $activity->update($data);

            return redirect(route('activity.index'))->with('success', 'Work day updated successfully');
        }


        //validation function
        private function validateActivity(Request $request)
        {
            return $request->validate([
                'officer_id' => 'required|exists:officers,id',
                'visitor_id' => 'nullable|exists:visitors,id',
                'name' => 'required|string|max:255',
                'type' => ['required', 'in:appointment'],
                'status' => ['required', 'in:active'],
                'date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
            ]);
        }
    
}
