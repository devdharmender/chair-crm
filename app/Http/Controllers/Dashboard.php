<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\authentication\UserCheck;
use App\Models\authentication\Rolemastermodel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function dashboard(){
        if(session()->get('id') === 1){
        $users = UserCheck::where('email_verification','verified')->where('user_status','0')->paginate(10);
        $role = Rolemastermodel::all();
        // chart for active , inactive , rejected and pending user 
        $totalusers = UserCheck::all()->count();
        $stats = [
            'email_pending' => UserCheck::where('email_verification', 'pending')->count(),
            'active' => UserCheck::where('user_status', 1)->where('status', 'active')->where('email_verification', 'verified')->count(),
            'inactive' => UserCheck::where('user_status', 0)->where('status', 'inactive')->where('email_verification', 'verified')->count(),
            'rejected' => UserCheck::where('user_status', 3)->where('status', 'inactive')->where('email_verification', 'verified')->count(),
        ];

// return response()->json($stats);

return view('admin.dashboard',compact('users','role','stats','totalusers'));
        }
    }
}
