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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@if(isset($category)) Edit Category @else Add Category @endif </h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="{{url('home')}}" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Category</li>
					</ul>
				</div>

				<a href="{{ url('category') }}" class="btn btn-danger font-weight-bolder btn-sm">Back</a>
			</div>
		</div>
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card">
					<div class="card-body p-lg-17">
						<div class="row mb-3">
							<div class="col-md-12 pe-lg-10">
								<form action=" @if(isset($category)) {{route('update_category' ,base64_encode($category->id))}} @else {{route('store_category')}} @endif" class="form mb-15" id="kt_contact_form" method="POST">
									@csrf
									<h1 class="fw-bold text-dark mb-9">@if(isset($category)) Edit Category @else Add Category @endif</h1>
									<div class="row mb-5">
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Category Name</label>
											<input type="text" class="form-control form-control-solid" placeholder="Enter Category Name" name="cat_name" @if(isset($category)) value="{{$category->cat_name}}" @endif>
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

@push('js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
	$('#kt_contact_form').validate({
	    rules: {
	        name: {
	            required: true
	        },
	        group_id: {
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






