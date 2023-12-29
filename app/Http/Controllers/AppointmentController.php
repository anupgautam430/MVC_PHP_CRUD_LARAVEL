<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Officer;
use App\Models\Visitor;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');//for search
        $searchBy = $request->input('search_by'); //for type of data from table to search

        $query = Appointment::query();

        if ($search && $searchBy) {
            $query->where($searchBy, 'like', "%$search%");
        }

        $appointments = $query->get();

        return view('appointments.index', [
            'appointments' => $appointments,
            'search' => $search,
            'searchBy' => $searchBy,
        ]);
    }

    public function create()
    {
        $officer = Officer::pluck('name', 'id');
        $visitor = Visitor::pluck('name', 'id');

        return view('appointments.create', compact('officer','visitor'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'officer_id' => 'required|exists:officers,id',
            'visitor_id' => 'nullable|exists:visitors,id',
            'name' => 'required|string|max:255',
            'type' => 'required|in:Appointment,Leave,Break',
            'status' => 'in:active',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $conditionsCheck = $this->checkConditionsForAppointments($data);

        if ($conditionsCheck === true) {
            $activityData = [
                'officer_id' => $data['officer_id'],
                'Type' => $data['type'],
                'Start_Date' => $data['date'],
                'Start_Time' => $data['start_time'],
                'End_Date' => $data['date'],
                'End_Time' => $data['end_time'],
                'Status' => $data['status']??'active',
            ];

            $newActivity = Activity::create($activityData);

            $newAppointment = Appointment::create([
                'officer_id' => $data['officer_id'],
                'visitor_id' => $data['visitor_id'],
                'name' => $data['name'],
                'type' => $data['type'],
                'status' => $data['status']??'active',
                'date' => $data['date'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'activity_id' => $newActivity->id,
            ]);

            return redirect(route('appointments.index'))->with('success', 'Appointment created successfully');
        } else {
            return $conditionsCheck;
        }
    }



    //accessing data in edit view
    public function edit(Appointment $appointments)
    {
        $officer = Officer::pluck('name', 'id');
        $visitor = Visitor::pluck('name', 'id');
        return view('appointments.edit', compact('appointments', 'officer', 'visitor'));
    }

        //update
        public function update(Appointment $appointments, Request $request){
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            // $conditionsCheck = $this->checkConditionsForActivity($data);

            $appointments->update($data);
                return redirect(route('appointments.index'))->with('success', 'Activity updated successfully');
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

        // conditions check for appointments
        private function checkConditionsForAppointments($data, $existingActivity = null)
        {
            $officer = Officer::find($data['officer_id']);
            $visitor = Visitor::find($data['visitor_id']);

            if ($visitor && $visitor->Status != 'active') {
                return redirect()->route('appointments.create')->with('error', 'Cannot create appointment for inactive visitor.');
            }

            if ($officer && $officer->status != 'Active') {
                return redirect()->route('appointments.create')->with('error', 'Cannot create appointment for inactive officer.');
            }

            if ($officer && $this->isOfficerUnavailable($officer, $data['date'], $data['start_time'], $existingActivity)) {
                return redirect()->route('appointments.create')->with('error', 'Officer is not available in this date.');
            }

            if ($visitor == 'active' && $this->hasVisitorAnotherActiveAppointment($visitor, $data['date'], $data['start_time'], $existingActivity)) {
                return redirect()->route('appointments.create')->with('error', 'Visitor has another appointment in this date.');
            }

            if ($officer && !$this->isActivityWithinOfficerWorkSchedule($officer, $data['start_time'], $data['end_time'])) {
                return redirect()->route('appointments.create')->with('error', 'Activity is not in officer work schedule.');
            }

            // if (!$this->isActivityInFuture($data['date'], $data['start_time'])) {
            //     return redirect()->route('appointments.create')->with('error', 'Cannot add appointments for the past.');
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


    public function cancel(Appointment $appointments)
    {
        $newStatus = $appointments->status == 'Cancelled' ? 'Active' : 'Cancelled';

        $appointments->update(['status' => $newStatus]);

        if ($newStatus == 'Cancelled') {
            $activity = Activity::where('officer_id', $appointments->officer_id)
                ->where('Type', 'Appointment')
                ->where('Start_Date', $appointments->date)
                ->where('Start_Time', $appointments->start_time)
                ->first();

            if ($activity) {
                $activity->update(['Status' => 'Cancelled']);
            }
        }

        $action = $newStatus == 'Cancelled' ? 'Cancelled' : 'Activated';
        $message = "Appointment $action successfully";

        return redirect(route('appointments.index'))->with('success', $message);
    }
}
