@extends('admin.admin_master')
@section('admin')   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="container-full">

	<!-- Main content -->
	<section class="content">
		
		<div class="box">
			<div class="box-header with-border">
				<h4 class="box-title">Change Admin Profile</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col">
						<form   method="POST" action="{{route('admin.profile.store')}}"  enctype="multipart/form-data"   >
							@csrf
							<div class="row">
								<div class="col-12">

									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<h5>Name: <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="name" class="form-control" value="{{ $editProfile->name}} " > <div class="help-block"></div></div>
												</div>

											</div>
											<div class="col-md-6">

												<div class="form-group">
													<h5>Amin Email  <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="email" name="email" value="{{$editProfile->email }}"  class="form-control"> <div class="help-block"></div></div>
													</div>

												</div>

											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<h5>File Input Field <span class="text-danger">*</span></h5>
														<div class="controls">
															<input type="file" id="image" name="profile_photo_path"   class="form-control" > <div class="help-block"></div></div>
														</div>
													</div>
													<div class="col-md-6">

														<img id="showImage" src=" {{ (!empty($editProfile->profile_photo_path) ? url('upload/admin_images/'.$editProfile->profile_photo_path) : url('upload/no_image.jpg')  )  }} " style="width: 100p; height: 100px; ">
															
													</div>
												</div>						



												<div class="text-xs-right">
													<button type="submit" class="btn btn-rounded btn-info">Submit</button>
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


<script type="text/javascript">
	
$(document).ready(function()
{	


	$('#image').change(function(e)
	{


		var reader=new FileReader();
		reader.onload= function(e){

			$('#showImage').attr('src',e.target.result);
		}
		reader.readAsDataURL(e.target.files['0']);

	});

});


</script>


@endsection()
















