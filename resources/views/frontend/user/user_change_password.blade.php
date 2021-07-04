@extends('frontend.main_master')
@section('content')


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"> <br>
                <img class="card-img-top" style="border-radius: 50%;" height="100%" width="100%" src=" {{ (!empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg')  )  }}  "> <br><br> 
                <ul class="list-group list-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary btn-block">Home</a> 
                    <a href=" {{ route('user.profile') }} " class="btn btn-sm btn-primary btn-block">Profile</a> 
                    <a href="{{ route('user.change.password') }}" class="btn btn-sm btn-primary btn-block">Change Password</a> 
                    <a href=" {{ route('user.logout') }} " class="btn btn-sm btn-danger btn-block">Logout</a> 
                    
                </ul>

            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">

                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span> <strong> {{ Auth::user()->name }} </strong> Change Password </h3>


                    <div class="card-body">
                        <form method="POST" action="{{route('user.update.password') }}"  >
                           @csrf

                           <div class="form-group">
                            <label class="info-title" >Current Password <span>*</span></label>
                            <input id="current_password" type="password" name="oldpassword"  class="form-control "   >
                        </div>  


                        <div class="form-group">
                            <label class="info-title" >New Password </label>
                            <input id="password" type="password" name="password" class="form-control "  >
                        </div>

                        <div class="form-group">
                            <label class="info-title" >Confirm Password </label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control "   name="phone">
                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-danger">Update</button>

                        </div>




                    </form>

                </div>   

            </div>

        </div>

    </div>

</div>

</div>


@endsection