<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Visitor;
use App\Models\Officer;

class AppointmentController extends Controller
{

    public function index(){
        $appointment = Appointment::all();
        return view('appointments.index',['appointments'=> $appointment]);
    }

    public function create()
    {
        $visitors = Visitor::all();
        $officers = Officer::all();

        return view('appointments.create', compact('visitors', 'officers'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'visitor_id' => 'required',
            'officer_id' => 'required',
            'appointment_time' => 'required|date|after_or_equal:today',
        ]);
       

        $visitor = Visitor::find($request->input('visitor_id'));
        $officer = Officer::find($request->input('officer_id'));

        if ($visitor->Status != 'active') {
            return redirect()->route('appointments.create')->with('error', 'Cannot create appointment for inactive visitor.');
        }
        
        if ($officer->status != 'Active') {
            return redirect()->route('appointments.create')->with('error', 'Cannot create appointment for inactive officer.');
        }

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }
}
