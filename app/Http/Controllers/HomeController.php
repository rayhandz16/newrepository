<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // if ($request->user()->hasRole('employee')) {
        //     return view('dashemployee');
        // } elseif ($request->user()->hasRole('manager'))  {
        //     return view('dashmanager');
        // }

        if ($request->user()->hasRole('employee')) {
            return redirect('employee')->with('status',"Login Success!!");
        } elseif ($request->user()->hasRole('manager'))  {
            return redirect('manager')->with('status',"Login Success!!");
        }
        
        
    }
}
