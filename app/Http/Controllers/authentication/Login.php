<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\authentication\UserCheck;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Str;


class Login extends Controller
{
    public function login(){
        if(session()->has('token')){
            return view('admin.dashboard');
        }else{
            return view('admin.auth.login');
        }
        die;
        
    }
    public function authCheck(Request $request){
        $auth = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'required'=>'This feild is required',
            'email'=>'Invalid email, please fill valid email',
        ]);

            try {
        $emailid = $request->input('email');
        $password = $request->input('password');
        $user = UserCheck::where('email', $emailid)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                 if ($user->email_verification != 'verified') {
                    return redirect()->route('dashboard-log')
                        ->with('message', 'You have not verified your email. Please verify your email before logging in.');
                }
                if ($user->status === 'active' && $user->user_status == 1) {
                    session([
                        'status' => $user->status,
                        'id' => $user->id,
                        'role_id' => $user->role_id,
                        'username' => $user->username,
                    ]);

                    return redirect()->route('system-dashboard');

                } elseif ($user->user_status == 0) {
                    return redirect()->route('dashboard-log')
                        ->with('message', 'Your account is pending approval.');
                } elseif ($user->user_status == 3) {
                    return redirect()->route('dashboard-log')
                        ->with('message', 'Your account has been rejected. Contact admin.');
                }
                else {
                    return redirect()->route('dashboard-log')
                        ->with('message', 'Your account is inactive. Please contact admin.');
                }

            } else {
                return redirect()->route('dashboard-log')
                    ->with('message', 'Incorrect password. Please try again.');
            }

        } else {
            return redirect()->route('dashboard-log')
                ->with('message', 'Email not found.');
        }

    } catch (\Exception $e) {
        Log::error('Error during login: ' . $e->getMessage());

        return response()->json([
            'message' => 'An error occurred while processing your request.',
            'error' => $e->getMessage()
        ], 500);
    }

    }
    public function logout(){
        Session::flush();
        return redirect()->route('dashboard-log');
    }

    // forget password
    public function forgetpassword(){
        return view('admin.auth.forgetpass');
    }
    
}