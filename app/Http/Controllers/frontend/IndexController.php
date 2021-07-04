<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class IndexController extends Controller
{
    public function index()
    {
        

        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();

        return Redirect()->route('login');
    }
    public function UserProfile()
    {
        
        $id=Auth::user()->id;

        $user=User::find($id);


        return view('frontend.user.user_profile',compact('user'));


    }

    public function UserProfileUpdate(Request $request)
    {
        
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;

        if ($request->file('profile_photo_path')) {
              
            $file=$request->file('profile_photo_path'); //take the file from view
            // unlink(public_path('upload/admin_images/'.$data->profile_photo_path));

            $fileName=date('YmdHi').$file->getClientOriginalName(); // generate first date and then add extension
            $file->move(public_path('upload/user_images'),$fileName); // move to the folder in public

            $data['profile_photo_path']=$fileName; // store in data base

        }

        $data->save();

        // NOTIFICTION FOR TOASTER

        $notification=array(

            'message' => 'User Profile Updated Succefully',
            'alert-type' => 'success'

        );



        return redirect()->route('dashboard')->with($notification);


    }

    public function UserChangePassword()
    {

        $id=Auth::user()->id;
        $user=User::find($id);
    
        return view('frontend.user.user_change_password',compact('user'));

    }


    public function UserUpdatePassword(Request $request)
    {
        
        $hashPassword=Auth::user()->password;

        if (Hash::check($request->oldpassword,$hashPassword) ) {
            

            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();

            Auth::logout();

            return redirect()->route('user.logout');
        }else{


            return redirect()->back();
        }



    }


}
