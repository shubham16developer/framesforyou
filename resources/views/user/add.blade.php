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
	<div class="d-flex flex-column flex-column-fluid">
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@if(isset($user)) Edit User @else Add User @endif </h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="{{url('home')}}" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">User</li>
					</ul>
				</div>

				<a href="{{ url('users') }}" class="btn btn-danger font-weight-bolder btn-sm">Back</a>
			</div>
		</div>
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card">
					<div class="card-body p-lg-17">
						<div class="row mb-3">
							<div class="col-md-12 pe-lg-10">
								<form action="@if(isset($user)) {{route('update_user',base64_encode($user->id))}} @else {{route('store_user')}} @endif" class="form mb-15" method="POST">
									@csrf
									<h1 class="fw-bold text-dark mb-9">@if(isset($user)) Edit User @else Add User @endif</h1>
									<div class="row mb-5">
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">First Name</label>
											<input type="text" class="form-control form-control-solid" required placeholder="Enter First Name" name="first_name" @if(isset($user)) value="{{$user->first_name}}" @endif>
										</div>
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Last Name</label>
											<input type="text" class="form-control form-control-solid" required placeholder="Enter Last Name" name="last_name" @if(isset($user)) value="{{$user->last_name}}" @endif >
										</div>
									</div>
									<div class="d-flex flex-column mb-5 fv-row">
										<label class="fs-5 fw-semibold mb-2">Email</label>
										<input class="form-control form-control-solid" placeholder="Enter Email" required name="email" @if(isset($user)) value="{{$user->email}}" @endif >
									</div>
									@if(!isset($user))
									<div class="d-flex flex-column mb-10 fv-row">
										<label class="fs-6 fw-semibold mb-2">Password</label>
										<input type="password" class="form-control form-control-solid" placeholder="Enter Password" name="password" required />
									</div>
									@endif
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

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
	$('#kt_contact_form').validate({
	    rules: {
	        first_name: {
	            required: true,
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
</script>

@endpush






