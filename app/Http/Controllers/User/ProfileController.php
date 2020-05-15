<?php

namespace App\Http\Controllers\User;

use App\Model\user\User;
use App\Model\admin\admin;
use App\Model\admin\profile;
use App\Model\admin\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id)
    {
        $user = User::find($id);

        if($user){

            return view('user.profile.profile')->withUser($user); 
        }else{
            return redirect()->back();
        }
        
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric',
            'portfolio' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'bio' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user = profile::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.submitPhoto'));
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileEdit($id)
    {
      $user = admin::find($id);
      $user = profile::find($id);
      $roles = role::all();
      return view('user.profile.profileEdit',compact('user','roles')); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request, $id){

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
            'portfolio' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'bio' => 'required|string'
        ]);

        $request->status? : $request['status']=0;
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        $user = profile::where('id',$id)->update($request->except('_method','role'));
        admin::find($id)->roles()->sync($request->role);
        profile::find($id)->roles()->sync($request->role);
        return redirect(route('submitPhoto'))->with('message','User updated successfully');
    }
    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(200, 200)->save(public_path('/uploads/avatars/'.$filename));
        }
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
        
        return view('user.profile.profile')->withUser($user);
    }

    public function showChangePasswordForm(){
        return view('user.profile.changepassword');
    }
    
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

    /* $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);*/

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }


}
