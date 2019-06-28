<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $is_profile_updated = $this->is_profile_updated(Auth::user()->id);

        if (strtolower(Auth::user()->name) == 'admin') {
            return redirect('/team/list');
        }
        return view('home', ["is_profile_updated" => $is_profile_updated]);
    }

    /** Return view to upload file */
    public function uploadFile() {
        return view('uploadfile');
    }

    /** Example of File Upload */
    public function uploadFilePost(Request $request) {
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
        $request->fileToUpload->store('logos');
        return back()->with('success', 'You have successfully upload image.');
    }

    public function upload(Request $request) {
        $files = $request->allFiles();

        
        if (isset($files['file'])) {

		$request->validate([
           	 'file' => 'required|file|max:1024',
        	]);

            $file = $request->file('file');
            //print_r($file);
           // die();
            $storage_path = '/uploads/' . date('Y') . '/' . date('m');
            $file_name = str_random(12) . time() . "." . $file->getClientOriginalExtension();


            $file->move(public_path().$storage_path, $file_name);
            //die();
            //$path = Storage::putFileAs($storage_path, $request->file('file'), $file_name);

            $posted_data["file_name"] = $file_name;
            $posted_data["file_type"] = $request->file_type;
            $posted_data["file"] = $storage_path;

            $model = File::create([
                        'file_name' => $file_name,
                        'file_type' => $request->file_type,
                        'file' => $storage_path,
            ]);

            return json_encode($model);
        }
    }

    public function is_profile_updated($user_id) {
        $data = Team::where([
                    ['user_id', '=', $user_id],
                    ['is_profile_updated', '=', 1]
                ])->with('teamMember')->first();
        return $data;
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
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
 
        $validatedData = $request->validate([
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
