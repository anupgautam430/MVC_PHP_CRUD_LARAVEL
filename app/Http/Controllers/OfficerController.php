<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officer;
use App\Models\Post;
use App\Models\WorkDays;

class OfficerController extends Controller
{
    public function index(){
        $officer = Officer::all();
        return view('officer.index',['officer'=> $officer]);
    }

    public function create()
    {
        $post = Post::pluck('name', 'id');
        return view('officer.create', compact('post'));
    }

    //store the officer details in database
    public function store(Request $request)
    {

        $data = $this->validateOfficer($request);

        $newOfficer = Officer::create($data);
        return redirect(route('officer.index'));
    }

    public function edit(Officer $officer)
        {
            $post = Post::pluck('name','id');
            $workday = WorkDays::pluck('officer_id','day_of_week');
            return view('officer.edit', ['officer'=> $officer],compact('post','workday'));
        }

        public function update(Officer $officer, Request $request){
            $data = $this->validateOfficer($request);

            $officer->update($data);

            return redirect(route('officer.index'))->with('success', 'Officer updated successfully');
        }

        //appointment view logic
        public function activity(Officer $officer)
        {
            // Load the visitor activities with officers
            $activities = $officer->appointmentsWithVisitor;

            return view('officer.appointments', ['officer' => $officer, 'activities' => $activities]);
        }

        //handle the activation and deactivation with condition of officer where appointment also affected
        public function handle(Officer $officer)
        {
            $action = request('action');

            if ($action == 'Activate') {
                // Activate the visitor
                $officer->update(['status' => 'Active']);

                // Activate related future activities which are deactivated
                $officer->activities()
                    ->where('status', 'Inactive')
                    ->whereDate('date', '>=', now())
                    ->whereHas('visitor', function ($query) {
                        $query->where('Status', 'active');
                    })
                    ->update(['status' => 'Active']);

                $message = 'Officer Activated successfully';
            } elseif ($action == 'Deactivate') {
                // Deactivate the visitor
                $officer->update(['status' => 'Inactive']);

                // Deactivate related future activities
                $officer->activities()
                    ->where('status', 'InActive')
                    ->update(['status' => 'Active']);

                $message = 'Officer Deactivated successfully';
            } else {
                $message = 'Invalid action';
            }

            return redirect(route('officer.index'))->with('success', $message);
        }



    ///function of validation
    private function validateOfficer(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:active',
            'work_start_time' => 'required|date_format:H:i',
            'work_end_time' => 'required|date_format:H:i|after:work_start_time',
            'post_id' => 'required|exists:posts,id'
        ]);
    }
}
