<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	 /**
     * Show the dashboard for the current user.
     *
     * @return Response
     */

    function index(){
    	return view('dashboard');
    }
}
