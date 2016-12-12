<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return 'Leave Overview';
    }

    /**
     * Show the Leave application form.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply()
    {
        return 'Leave Application';
    }


}
