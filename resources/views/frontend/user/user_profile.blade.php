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
                    <h3 class="text-center"><span class="text-danger">Hi...</span> <strong> {{ Auth::user()->name }} </strong> Update Profile </h3>


                    <div class="card-body">
                        <form method="POST" action="{{route('user.profile.update') }}" enctype="multipart/form-data" >
                         @csrf

                         <div class="form-group">
                            <label class="info-title" >Name <span>*</span></label>
                            <input type="text" class="form-control " value="{{ $user->name }}"  name="name">
                        </div>  


                         <div class="form-group">
                            <label class="info-title" >Email </label>
                            <input type="email" class="form-control " value="{{  $user->email }}"  name="email">
                        </div>

                         <div class="form-group">
                            <label class="info-title" >Phone </label>
                            <input type="text" class="form-control " value="{{ $user->phone }}"  name="phone">
                        </div>


                         <div class="form-group">
                            <label class="info-title" >Image</label>
                            <input type="file" class="form-control "  name="profile_photo_path">
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