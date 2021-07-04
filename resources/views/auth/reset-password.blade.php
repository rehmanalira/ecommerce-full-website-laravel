@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Change Password</h4>

                    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}"> 

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input id="email" type="email" name="email" required class="form-control unicase-form-control text-input"  value="{{ old('email', $request->email) }}"  autofocus>
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            <input type="password"  required class="form-control unicase-form-control text-input" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="password"  required class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
                        </div>


                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
                    </form>                 
                </div>
                <!-- Sign-in -->


                <!-- create a new account -->           </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
        </div>



        @include('frontend.body.brands')
        @endsection


