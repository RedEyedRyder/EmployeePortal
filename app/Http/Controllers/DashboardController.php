<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the dashboard for the current user.
     *
     * @return Response
     */

    function index(){
    	return view('dashboard');
    }
}
