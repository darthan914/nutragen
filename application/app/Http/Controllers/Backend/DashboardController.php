<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

use App\Http\Controllers\Controller;

use App\Employee;
use App\User;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $year = '';
        for ($i=2000; $i <= (int)date('Y') ; $i++) { 
            $year[] = $i; 
        }

        $month = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        
    	return view('backend.dashboard.index', compact('request', 'year', 'month'));
    }
}
