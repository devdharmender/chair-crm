<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\authentication\UserCheck;
use Illuminate\Support\Facades\Session;
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
            'email'=>'Invalid email, please fill correct email',
        ]);

            try {
                if ($auth) {
                    $emailid = $request->input('email');
                    $password = $request->input('password');

                    $users = UserCheck::where('email',$emailid)->first();
                    
                    if($users){
                        if(Hash::Check($password,$users->password)){
                            
                            session(['token' => $users->remember_token,'id' => $users->id,'type' => $users->type]);
                            return redirect()->route('system-dashboard');
                        }else{
                            return redirect()->route('dashboard-log')->with('message', 'Please Check Your Password');
                        }
                    }else{
                            return redirect()->route('dashboard-log')->with('message', 'Email is not correct');
                    }
                }
            }
            catch (\Exception $e) {
                \Log::error('Error retrieving input: ' . $e->getMessage());

                return response()->json([
                    'message' => 'An error occurred while processing the request.',
                    'error' => $e->getMessage()
                ], 500);
            }
    }
    public function logout(){
        Session::flush();
        return redirect()->route('dashboard-log');
    }
    
}