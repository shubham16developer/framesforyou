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
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add Role</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="{{ url('home') }}" class="text-muted text-hover-primary">Home</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-400 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">Role</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>

									<a href="{{ url('roles-permission') }}" class="btn btn-danger font-weight-bolder btn-sm">Back</a>

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
													<form action="#" class="form mb-15" id="kt_contact_form" >
														<h1 class="fw-bold text-dark mb-9">Add Role</h1>
														<!--begin::Input group-->
														<div class="row mb-5">
															<!--begin::Col-->
															<div class="col-md-12 fv-row">
																<!--begin::Label-->
																<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
																	<span class="required">Role Name</span>
																</label>
																<input type="text" placeholder="Enter Role Name" autocomplete="off" class="form-control form-control-lg form-control-solid" required name="grp_name" placeholder="" >
																
															</div>
														</div>
													
														<button style="float:right;" type="submit" class="btn btn-primary" id="kt_contact_submit_button">
															<span class="indicator-label">Submit</span>
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>

</script>

@endsection






