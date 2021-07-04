@extends('admin.admin_master')
@section('admin')   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="container-full">

	<!-- Main content -->
	<section class="content">
		
		<div class="box">
			<div class="box-header with-border">
				<h4 class="box-title">Change Password</h4>
		
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col">
						<form   method="POST" action=""    >
							@csrf
							<div class="row">
								<div class="col-12">

									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<h5>Current Password: <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="password" id="current_password" name="oldpassword" required="" class="form-control"  >
												</div>
												</div>

											</div>


										</div>
										<div class="row">
											<div class="col-md-6">

												<div class="form-group">
													<h5>New Password  <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="password" id="password" required=""   class="form-control"> </div>
													</div>

												</div>

											</div>

											<div class="row">
												<div class="col-md-6">

													<div class="form-group">
														<h5>Confirm Password  <span class="text-danger">*</span></h5>
														<div class="controls">
															<input type="password" id="password_confirmation" required=""   class="form-control"> <div class="help-block"></div></div>
														</div>

													</div>

												</div>



												<div class="text-xs-right">
													<button type="submit" class="btn btn-rounded btn-info">Update</button>
												</div>
											</form>

										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								</div>
								<!-- /.box-body -->
							</div>



						</section>
						<!-- /.content -->
					</div>





					@endsection()
















