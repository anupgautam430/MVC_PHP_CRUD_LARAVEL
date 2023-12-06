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

        // Check conditions before creating activity
        if ($this->checkConditionsForActivity($data)) {
            $newActivity = Activity::create($data);
            return redirect(route('activity.index'))->with('success', 'Activity created successfully');
        } else {
            return redirect(route('activity.index'))->with('error', 'Cannot add activity. Check conditions.');
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

        // Additional conditions check for activity
        private function checkConditionsForActivity($data, $existingActivity = null)
        {
            $officer = Officer::find($data['officer_id']);
            $visitor = Visitor::find($data['visitor_id']);

            //dd($officer, $visitor, $data);

            // b. If officer is deactivated, user can’t add any activity for that officer
            if ($officer && $officer->status == 'inactive') {
                return false;
            }

            // c. If visitor is deactivated, user can’t add any activity for that visitor
            if ($visitor && $visitor->status == 'inactive') {
                return false;
            }

            // d. If officer is on break, leave, or busy on the chosen date and time, user can’t add activity
            if ($officer && $this->isOfficerUnavailable($officer, $data['date'], $data['start_time'], $existingActivity)) {
                return false;
            }

            // e. If visitor has another active appointment on the chosen date and time, user can’t add appointment
            if ($visitor && $data['type'] == 'appointment' && $this->hasVisitorAnotherActiveAppointment($visitor, $data['date'], $data['start_time'], $existingActivity)) {
                return false;
            }

            // g. User should only be able to add activity if it falls between officer’s work start and end time, and in work days
            if ($officer && !$this->isActivityWithinOfficerWorkSchedule($officer, $data['start_time'], $data['end_time'])) {
                return false;
            }
            

            // i. User should not be able to add activity for the past.
            if (!$this->isActivityInFuture($data['date'], $data['start_time'])) {
                return false;
            }

            return true;
        }


    /////1
        private function isOfficerUnavailable($officer, $date, $startTime, $existingActivity = null)
        {
            //logic to check if officer is on break, leave, or busy on the chosen date and time
            $activityDateTime = strtotime("$date $startTime");

            // Check if officer has any existing activity at the same date and time
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
            //logic to check if the visitor has another active appointment on the chosen date and time
            $activityDateTime = strtotime("$date $startTime");

            // Check if visitor has any existing active appointment at the same date and time
            if ($existingActivity && $existingActivity->visitor_id === $visitor->id) {
                return false; 
            }
            return false;
        }

        //3
        private function isActivityWithinOfficerWorkSchedule($officer, $startTime, $endTime)
        {
            // Convert input date and times to timestamps
            $activityStartTimestamp = strtotime("$officer $startTime");
            $activityEndTimestamp = strtotime("$officer $endTime");

            // Convert officer's work start and end times to timestamps
            $workStartTimestamp = strtotime($officer->start_time);
            $workEndTimestamp = strtotime($officer->end_time);

            // Check if the activity falls within officer's work start and end time
            $isWithinWorkTime = ($activityStartTimestamp >= $workStartTimestamp && $activityEndTimestamp <= $workEndTimestamp);

            return $isWithinWorkTime;
        }

        ///4
        private function isActivityInFuture($date, $startTime)
        {
            // logic to check if the activity is in the future
            $activityDateTime = strtotime("$date $startTime");

            return ($activityDateTime > time());
        }


        ///5
        private function isActivityInWorkDays($officer, $date)
        {
            // logic to check if the activity falls on officer's work days
            $dayOfWeek = date('N', strtotime($date)); // 1 (Monday) to 7 (Sunday)

            return in_array($dayOfWeek, json_decode($officer->work_days));
        }

    
}
