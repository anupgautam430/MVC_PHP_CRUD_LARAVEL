<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Visitor;
use App\Models\Officer;

class ActivityController extends Controller
{

    public function index(){
        $activities = Activity::all();

        foreach ($activities as $activity) {
            if ($activity->Status=='Active' && $activity->End_Date < now() && $activity->End_Time < now()) {
                $activity->Status = 'Completed';
            }
            elseif ($activity->Status=='Cancelled' && $activity->End_Date < now() && $activity->End_Time < now()) {
                $activity->Status = 'Cancelled';
            } else {
                $activity->Status = 'Active';
            }
        }
        return view('activities.index', ['activities' => $activities]);
    }

    public function create()
    {
        $visitors = Visitor::all();
        $officers = Officer::all();

        return view('activities.create', compact('visitors', 'officers'));
    }

    public function store(Request $request)
    {

        $request->validate([
            //'visitor_id' => 'required',
            'officer_id' => 'required',
            'Type' => 'required|in:Appointment,Leave,Break',
            'Start_Date' => 'required|date|after_or_equal:today',
            'Start_Time' => 'required|date_format:H:i',
            'End_Date' => 'required|date',
            'End_Time' => 'required|date_format:H:i',
            'Status' => 'in:Active',
        ]);


        $officer = Officer::find($request->input('officer_id'));

        if ($officer->status != 'Active') {
            return redirect()->route('activities.create')->with('error', 'Cannot create activities for inactive officer.');
        }

        Activity::create($request->all());

        return redirect()->route('activities.index')->with('success', 'activities created successfully.');
    }

    public function cancel(Activity $activities)
    {
        $newStatus = $activities->Status == 'Cancelled' ? 'Active' : 'Cancelled';

        $activities->update(['Status' => $newStatus]);

        $action = $newStatus == 'Cancelled' ? 'Cancelled' : 'Activate';
        $message = "Activity $action successfully";

        return redirect(route('activities.index'))->with('success', $message);
    }
}
