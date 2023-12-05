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
            'appointment_time' => 'required|date',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.create')->with('success', 'Appointment created successfully.');
    }
}
