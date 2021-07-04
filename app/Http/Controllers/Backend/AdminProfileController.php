<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        
        $adminData=Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));

    }

    public function AdminProfileEdit()
    {

        $editProfile=Admin::find(1);
        
        return view('admin.admin_profile_edit',compact('editProfile'));

    }

    public function AdminProfileStore(Request $request)
    {
        
        $data=Admin::find(1);
        $data->name=$request->name;
        $data->email=$request->email;

        if ($request->file('profile_photo_path')) {
              
            $file=$request->file('profile_photo_path'); //take the file from view
            unlink(public_path('upload/admin_images/'.$data->profile_photo_path));

            $fileName=date('YmdHi').$file->getClientOriginalName(); // generate first date and then add extension
            $file->move(public_path('upload/admin_images'),$fileName); // move to the folder in public

            $data['profile_photo_path']=$fileName; // store in data base

        }

        $data->save();

        // NOTIFICTION FOR TOASTER

        $notification=array(

            'message' => 'Admin Updated Succefully',
            'alert-type' => 'success'

        );



        return redirect()->route('admin.profile')->with($notification);

    }


    public function AdminChangePassword()
    {
        

        return view('admin.admin_change_password');

    }

    public function AdminUpdatePassword(Request $request)
    {
        
        $hashPassword=Admin::find(1)->password;

        if (Hash::check($request->oldpassword,$hashPassword) ) {
            

            $admin=Admin::find(1);
            $admin->password=Hash::make($request->password);
            $admin->save();

            Auth::logout();

            return redirect()->route('admin.logout');
        }else{


            return redirect()->back();
        }



    }







}
