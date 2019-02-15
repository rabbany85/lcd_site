<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    public function index()
    {
        
        return $this->allUserDashboard();
    }

    public function profile()
    {
        
        $sidebar = view('layouts.sidebar');
        $mainContent = view('layouts.profile');
        return view('layouts.userMaster', compact('mainContent', 'sidebar'));
    }

    
    public function allUserDashboard(){
        if(Auth::User()->user_type === 'Super Admin'){
            return view('grid');
        }
        if(Auth::User()->user_type === 'Manager'){
            return view('grid');
        }
        if(Auth::User()->user_type === 'Admin'){
            return view('grid');
        }
        if(Auth::User()->user_type === 'Client'){
            return view('grid');
        }
    }

   
}
