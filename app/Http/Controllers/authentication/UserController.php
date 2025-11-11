<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\authentication\Rolemastermodel;
use App\Models\authentication\UserCheck;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\Users;
use App\Mail\UserAccessUpdate;
use App\Mail\AccountDeactivated;
use App\Mail\Accoundapproved;
use App\Mail\UserStatus;
use App\Mail\AccountActivated;
use App\Mail\UserRejected;

class UserController extends Controller
{
    // <<===================== active user page =======================>>
    public function activeusers(){
        // $users = UserCheck::where('user_status','1' && 'status','active')->orderBy('id','desc')->paginate(10);
        $users = UserCheck::join('rolemaster','rolemaster.id', '=' , 'users.role_id')->where('users.user_status','1')->where('users.status','active')->select(
        'users.id as user_id',
        'users.username',
        'users.email',
        'users.mobile_number',
        'users.profile_image',
        'users.role_id',
        'users.user_status',
        'users.status',
        'users.email_notifications',
        'users.dashboard_alerts',
        'rolemaster.role_name'
        )->orderBy('users.id','desc')->paginate(10);
        $role = Rolemastermodel::all();
        return view('admin.users.activeusers',compact('users','role'));
    }
    // <<===================== add user page =======================>>
    public function loadaddusers(){
        $role = Rolemastermodel::all();
        return view('admin.users.addusers',compact('role'));
    }
    // <<===================== new User add by admin =======================>>

    public function addusers(Request $request){
            
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phonenumber' => 'required|numeric|unique:users,mobile_number',
            'password' => 'required|min:8|max:25',
            'usersprofile' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
            'role' => 'required',
        ], [
            'required' => 'This field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'phonenumber.unique' => 'This mobile number is already taken.',
            'usersprofile.required' => 'Please upload a profile picture.',
            'usersprofile.file' => 'The uploaded file must be a valid file.',
            'usersprofile.mimes' => 'Only jpg, jpeg, png, and gif files are allowed.',
            'usersprofile.max' => 'Maximum allowed file size is 1MB.',
        ]);
        // file store here =========================>
            $file = $request->file('usersprofile');
            $extension = $file->getClientOriginalExtension();
            $name = $request->input('username');
            $date = date('d_m_Y_H_i_s');
            $removespace = str_replace(' ','_', $name);
            $filename = $removespace . '-' . $date . '.' . $extension;
            $path = $file->storeAs('userProfile',$filename,'public');
        // file store end here =========================>
        if($validatedData){
            $data = new UserCheck();
            $data->username = $request->input('username');
            $data->email = $request->input('email');
            $data->mobile_number = $request->input('phonenumber');
            $data->role_id = $request->input('role');
            $data->profile_image = $path;
            $data->password = Hash::make($request->input('password'));

            if($data->save()){

                $subject = "Welcome to ".$name." MixHub Services!";
                Mail::to($data->email)->send(new Users($data, $subject));
                return redirect()->route('active-users')->with('message','Success!! User added successfully.');
            }else{
                return redirect()->route('active-users')->with('error','Error!, Something went wrong please wait for sometime.');
            }
        }

    }
    // <<===================== access upadte =======================>>
    public function updateusertype(Request $request){
        // return "this  is userupdate";
        $userid = $request->input('userid');
        $roleid = $request->input('roleid');
        $sessionid = session()->get('id');
        $admintype = UserCheck::where('id', $sessionid)->first();
        if($admintype->role_id == 1){
            $data = UserCheck::where('id', $userid)->first();
            $data->role_id = $roleid;
            if($data->save()){
                $subject = "MixHub Access update ".$data->username;
                Mail::to($data->email)->send(new UserAccessUpdate($data, $subject));
                return response()->json([
                    'success' => true,
                    'message' => 'User role updated successfully.'
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: You do not have permission to change roles.'
            ], 403);
        }
        
        
    }
    // <<===================== activate and deactivate users =======================>>
    public function statusupdate(Request $request){
        $uid = $request->input('userid');
        $mainid = str_replace('-status','',$uid);
        $sessionid = session()->get('id');
        $udata = UserCheck::where('id', $sessionid)->first();
        if($udata->role_id === 1){
        $data = UserCheck::where('id', $mainid)->first();
            ($data->status === 'active') ? $data->status = 'inactive' : $data->status = 'active';
            if($data->save()){
                $subject = 'Your accound with mixhub services has been '.$data->status;
                Mail::to($data->email)->send(new UserStatus($data, $subject));
                return response()->json([
                    'success' => true,
                    'message' => 'User '.$data->status.' successfully. '
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: You do not have permission to change roles.'
            ], 403);
        }
    }

    // <<=========================== inactive user list ====================================>>
    public function inactiveusers(){
        $user = UserCheck::where('user_status','1')->where('status','inactive')->orderBy('id','desc')->paginate(10);
        return view('admin.users.inactiveusers',compact('user'));
    }
    // <<=========================== inactive user list ====================================>>
    public function rejectedusers(){
        $user = UserCheck::where('user_status','3')->where('email_verification','verified')->orderBy('id','desc')->paginate(10);
        return view('admin.users.rejectedusers',compact('user'));
    }
    // <<=========================== acept user Dashboard action ====================================>>
    public function acceptuser($id){
        $data = UserCheck::where('id', $id)->first();
        $data->user_status = 1;
        $data->status = 'active';
        if($data->save()){
            $subject = 'Your accound with mixhub services has been accepted.';
            Mail::to($data->email)->send(new Accoundapproved($data, $subject));
            return redirect()->route('system-dashboard')->with('message','User accepted successfully. and ristricted  to visit any page.');
        }

    }
    // <<=========================== Reject user Dashboard action ====================================>>
    public function rejectuser($id){
        $data = UserCheck::where('id', $id)->first();
        $data->user_status = 3;
        if($data->save()){
            $subject = 'Your accound with mixhub services has been rejected.';
            Mail::to($data->email)->send(new UserRejected($data, $subject));
            return redirect()->route('system-dashboard')->with('message','User rejected successfully. and move to active user list.');
        }
    }

    // <<=========================== Deactivated user Dashboard action ====================================>>
    public function deactivated($id){
        $userdata = UserCheck::where('id',$id)->first();
        $userdata->status = 'inactive';
        $userdata->user_status = '3';
        if($userdata->save()){
            $subject = 'Account Deactivation Notice with MIXHUB-SERVICES';
            Mail::to($userdata->email)->send(new AccountDeactivated($subject,$userdata));
            return redirect()->route('active-users')->with('message','Account have been deavitated succussfully!');

        }
    }
    public function activated($id){
        $userdata = UserCheck::findOrFail($id);
        $userdata->status = 'active';
        $userdata->user_status = '1';

            if ($userdata->save()) {
                $subject = 'Account Activation Notice from MIXHUB-SERVICES';

                try {
                        Mail::to($userdata->email)->send(new AccountActivated($subject, $userdata));
                    } catch (\Exception $e) {
                        return redirect()->route('active-users')->with('error', 'Email could not be sent: ' . $e->getMessage());
                    }

                    return redirect()->route('active-users')->with('message', 'Account has been activated successfully!');
            }
        }
}