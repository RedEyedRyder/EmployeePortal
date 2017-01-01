<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth;
use App\LeaveApplication;

class LeaveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }


    /**
     * Show the Leave overview.
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        $allLeave = \App\LeaveApplication::
                            where('return_date','>', Carbon::now())
                            ->where('status', '=', '1')
                            ->get();

        return view('leave.overview', ['leave' => $allLeave]);
    }

    /**
     * Show the Leave application form.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply()
    {
        $leave_types = \App\LeaveType::all();
        return view('leave.apply', ["leave_types" => $leave_types]);
    }

    /**
     * Proccess the Leave application form.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        // Get the currently authenticated user's ID...
        $user_id = \Auth::id();

        //Validate request data
        $this->validate($request, [
            'start_date' => 'bail|required|date',
            'start_date_time' => 'required|in:am,pm',
            'return_date' => 'required|date',
            'return_date_time' => 'required|in:am,pm',
            'leave_type' => 'required|int'
        ]);

        //Save Data to the Database
        $leaveApplication = new \App\LeaveApplication;
        $start_date = Carbon::parse($request->start_date);
        if($request->start_date_time == 'pm'){
            $start_date->addHours('12');
        }
        $return_date = Carbon::parse($request->return_date);
        if($request->return_date_time == 'pm'){
            $return_date->addHours('12');
        }
        $days = $start_date->diffInHours($return_date) / 24;

        $leaveApplication->user_id = $user_id;
        $leaveApplication->start_date = $start_date;
        $leaveApplication->return_date = $return_date;
        $leaveApplication->leave_type_id = $request->leave_type;
        $leaveApplication->days = $days;

        $leaveApplication->save();
        
        //Redirect to route
        return redirect('/leave/overview')->with('success', 'Your leave has been submitted, you will be notified when your leave has been processed.');
    }


}
