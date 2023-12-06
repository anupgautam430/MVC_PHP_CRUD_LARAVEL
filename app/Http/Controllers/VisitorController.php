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

        //appointment 
        public function appointments(Visitor $visitor)
        {
            // Load the visitor appointments with officers
            $appointments = $visitor->appointmentsWithOfficers;

            return view('visitor.appointments', ['visitor' => $visitor, 'appointments' => $appointments]);
        }

         // Activate or deactivate a visitor and related appointments
        public function handle(Visitor $visitor)
        {
            $action = request('action');

            if ($action == 'activate') {
                // Activate the visitor
                $visitor->update(['Status' => 'active']);

                // Activate related future appointments which are deactivated
                $visitor->appointments()
                    ->where('status', 'inactive')
                    ->whereDate('appointment_time', '>=', now())
                    ->whereHas('officer', function ($query) {
                        $query->where('status', 'active');
                    })
                    ->update(['status' => 'active']);

                $message = 'Visitor activated successfully';
            } elseif ($action == 'deactivate') {
                // Deactivate the visitor
                $visitor->update(['Status' => 'inactive']);

                // Deactivate related future appointments
                $visitor->appointments()
                    ->where('status', 'active')
                    ->whereDate('appointment_time', '>=', now())
                    ->update(['status' => 'inactive']);

                $message = 'Visitor deactivated successfully';
            } else {
                $message = 'Invalid action';
            }

            return redirect(route('visitor.index'))->with('success', $message);
        }
}
