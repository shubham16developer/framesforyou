@extends('layouts.master')
@push('css')
	<style type="text/css">
		
		.error{
			color: red !important;
		}
	</style>
@endpush
@section('content')
	
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">My Profile</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-400 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">My Profile</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>

								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Contact-->
									<div class="card">
										<!--begin::Body-->
										<div class="card-body p-lg-17">
											<!--begin::Row-->
											<div class="row mb-3">
												<!--begin::Col-->
												<div class="col-md-12 pe-lg-10">
													<!--begin::Form-->
													<form action="{{route('update_profile')}}" class="form mb-15" id="kt_contact_form">
														<h1 class="fw-bold text-dark mb-9">My Profile</h1>
														<!--begin::Input group-->
														<div class="row mb-5">
															<!--begin::Col-->
															<div class="col-md-6 fv-row">
																<!--begin::Label-->
																<label class="fs-5 fw-semibold mb-2">First Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" value="{{$data->first_name}}" class="form-control form-control-solid" placeholder="Enter First Name" name="first_name" />
																<!--end::Input-->
															</div>
															<!--end::Col-->
															<!--begin::Col-->
															<div class="col-md-6 fv-row">
																<!--end::Label-->
																<label class="fs-5 fw-semibold mb-2">Last Name</label>
																<!--end::Label-->
																<!--end::Input-->
																<input type="text" value="{{$data->last_name}}" class="form-control form-control-solid" placeholder="Enter Last Name" name="last_name" />
																<!--end::Input-->
															</div>
															<!--end::Col-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-5 fv-row">
															<!--begin::Label-->
															<label class="fs-5 fw-semibold mb-2">Email</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input value="{{$data->email}}" class="form-control form-control-solid" placeholder="Enter Email" name="email" />
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-10 fv-row">
															<label class="fs-6 fw-semibold mb-2">Password</label>
															<input value="" type="password" class="form-control form-control-solid" placeholder="Enter New Password" name="password" />
															<input type="hidden" name="google2fa_secret" value="{{$data->google2fa_secret}}"/>
															<input type="hidden" name="id" value="{{$data->id}}"/>  
														</div>
														<div class="row mb-0">
															<!--begin::Label-->
															<label class="col-lg-4 col-form-label fw-semibold fs-6">2 Factor Authentication</label>
															<!--begin::Label-->
															<!--begin::Label-->
															<div class="col-lg-8 d-flex align-items-center">
																<div class="form-check form-check-solid form-switch form-check-custom fv-row">
																	<input class="form-check-input w-45px h-30px" name="two_fa" type="checkbox" id="2facheckbox"  @if($data->two_fa == '0' || $data->two_fa == null)  value="0" @else value="1" checked="checked"  @endif/>
																</div>
															</div>
															<!--begin::Label-->
														</div>
														<!--end::Input group-->
														<!--begin::Submit-->
														<button style="float:right;" type="submit" class="btn btn-primary" id="kt_contact_submit_button">
															<!--begin::Indicator label-->
															<span class="indicator-label">Update</span>
														</button>
													</form>
												</div>			
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>


	// $(document).ready(function() {
 //    	// console.log( "ready!" );
 //    	alert('hi')
	// });
	$('#kt_contact_form').validate({
	    rules: {
	        first_name: {
				lettersonly: true
	        },
	        last_name: {
	            required: true
	        },
	        email: {
	            required: true
	        },
	        password: {
	            required: true
	        }
	    },
	    highlight: function(element) {
	        $(element).closest('.form-control').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-control').removeClass('has-error');
	    }
});

    $('#2facheckbox').change(function() {
        if(this.checked) {
             $('#2facheckbox').val('1');
		}else{
			$('#2facheckbox').val('0');
		}        
    });


</script>

@endpush






