<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\authentication\UserCheck;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordUpdate;
// use Illuminate\Support\Str;


class Login extends Controller
{
    public function login(){
        if(session()->has('role_id')){
            return redirect()->route('system-dashboard')->with('error','you are already logged-in');
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
                        'email' => $user->email,
                        'profile' => $user->profile_image,
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
    public function submitEmail(Request $request){
        
        $email = $request->input('email');
        $data = UserCheck::where('email', $email)->first();
        if($data){
            $subject = "Reset Your Password";
            if(Mail::to($data->email)->send(new PasswordUpdate($data,$subject))){
                return redirect()->route('dashboard-log')->with('error','Password reset link has been sent to your email. please check and updated password.');
            }
        }else{
            return "no record found";
        }
    }
    public function updatepassword(Request $request){        
        return view('admin.auth.setnewpassword');
    }
    
}