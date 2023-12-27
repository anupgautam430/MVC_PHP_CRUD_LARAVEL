<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Officer;
use App\Models\Visitor;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');//for search
        $searchBy = $request->input('search_by'); //for type of data from table to search

        $query = Activity::query();

        if ($search && $searchBy) {
            $query->where($searchBy, 'like', "%$search%");
        }

        $activities = $query->get();

        return view('activity.index', [
            'activity' => $activities,
            'search' => $search,
            'searchBy' => $searchBy, 
        ]);
    }

    public function create()
    {
        $officer = Officer::pluck('name', 'id');
        $visitor = Visitor::pluck('name', 'id');
        
        return view('activity.create', compact('officer','visitor'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'officer_id' => 'required|exists:officers,id',
            'visitor_id' => 'nullable|exists:visitors,id',
            'name' => 'required|string|max:255',
            'type' => ['required', 'in:appointment'],
            'status' => ['required', 'in:active'],
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $conditionsCheck = $this->checkConditionsForActivity($data);

        //dd($conditionsCheck);

        if ($conditionsCheck === true) {
            $newActivity = Activity::create($data);
            return redirect(route('activity.index'))->with('success', 'Activity created successfully');
        } else {
            return $conditionsCheck; 
        }
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
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            // $conditionsCheck = $this->checkConditionsForActivity($data);
        
                $activity->update($data);
                return redirect(route('activity.index'))->with('success', 'Activity updated successfully');
        }
        


        //validation function
        // private function validateActivity(Request $request)
        // {
        //     return $request->validate([
        //         'officer_id' => 'required|exists:officers,id',
        //         'visitor_id' => 'nullable|exists:visitors,id',
        //         'name' => 'required|string|max:255',
        //         'type' => ['required', 'in:appointment'],
        //         'status' => ['required', 'in:active'],
        //         'date' => 'required|date|after_or_equal:today',
        //         'start_time' => 'required|date_format:H:i',
        //         'end_time' => 'required|date_format:H:i|after:start_time',
        //     ]);
        // }

        // conditions check for activity
        private function checkConditionsForActivity($data, $existingActivity = null)
        {
            $officer = Officer::find($data['officer_id']);
            $visitor = Visitor::find($data['visitor_id']);
        
            if ($visitor && $visitor->Status != 'active') {
                return redirect()->route('activity.create')->with('error', 'Cannot create appointment for inactive visitor.');
            }
        
            if ($officer && $officer->status != 'Active') {
                return redirect()->route('activity.create')->with('error', 'Cannot create appointment for inactive officer.');
            }
        
            if ($officer && $this->isOfficerUnavailable($officer, $data['date'], $data['start_time'], $existingActivity)) {
                return redirect()->route('activity.create')->with('error', 'Officer is not available in this date.');
            }
        
            if ($visitor && $data['type'] == 'appointment' && $this->hasVisitorAnotherActiveAppointment($visitor, $data['date'], $data['start_time'], $existingActivity)) {
                return redirect()->route('activity.create')->with('error', 'Visitor has another appointment in this date.');
            }
        
            if ($officer && !$this->isActivityWithinOfficerWorkSchedule($officer, $data['start_time'], $data['end_time'])) {
                return redirect()->route('activity.create')->with('error', 'Activity is not in officer work schedule.');
            }
        
            // if (!$this->isActivityInFuture($data['date'], $data['start_time'])) {
            //     return redirect()->route('activity.create')->with('error', 'Cannot add activity for the past.');
            // }
        
            return true;
        }
        
        
        private function isOfficerUnavailable($officer, $date, $startTime, $existingActivity = null)
        {
            $activityDateTime = strtotime("$date $startTime");

            if ($existingActivity && $existingActivity->officer_id === $officer->id) {
                return false; 
            }
            $breakStartTime = strtotime($officer->start_time);
            $breakEndTime = strtotime($officer->end_time);

            return ($activityDateTime >= $breakStartTime && $activityDateTime <= $breakEndTime);
        }

        ///2
        private function hasVisitorAnotherActiveAppointment($visitor, $date, $startTime, $existingActivity = null)
        {
            $activityDateTime = strtotime("$date $startTime");

            if ($existingActivity && $existingActivity->visitor_id === $visitor->id) {
                return false; 
            }
            return false;
        }

        //3
        private function isActivityWithinOfficerWorkSchedule($officer, $startTime, $endTime)
        {
            $activityStartTimestamp = strtotime("$officer $startTime");
            $activityEndTimestamp = strtotime("$officer $endTime");

            $workStartTimestamp = strtotime($officer->start_time);
            $workEndTimestamp = strtotime($officer->end_time);

            $isWithinWorkTime = ($activityStartTimestamp >= $workStartTimestamp && $activityEndTimestamp <= $workEndTimestamp);

            return $isWithinWorkTime;
        }

        ///4
        // private function isActivityInFuture($date, $startTime)
        // {
        //     $activityDateTime = strtotime("$date $startTime");

        //     return ($activityDateTime > time());
        // }   
        
        //cancel the status
        public function cancel(Activity $activity)
        {
            $newStatus = $activity->status == 'Cancelled' ? 'Active' : 'Cancelled';
            
            $activity->update(['status' => $newStatus]);

            $action = $newStatus == 'Cancelled' ? 'Cancelled' : 'Activate';
            $message = "Activity $action successfully";

            return redirect(route('activity.index'))->with('success', $message);
        }
}
