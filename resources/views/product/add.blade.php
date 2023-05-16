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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@if(isset($product)) Edit Product @else Add Product @endif </h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<li class="breadcrumb-item text-muted">
							<a href="{{url('home')}}" class="text-muted text-hover-primary">Home</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Product</li>
					</ul>
				</div>

				<a href="{{ url('product') }}" class="btn btn-danger font-weight-bolder btn-sm">Back</a>
			</div>
		</div>
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card">
					<div class="card-body p-lg-17">
						<div class="row mb-3">
							<div class="col-md-12 pe-lg-10">
								<form action=" @if(isset($product)) {{route('update_product' ,base64_encode($product->id))}} @else {{route('store_product')}} @endif" class="form mb-15" id="kt_contact_form" method="POST" enctype="multipart/form-data">
									@csrf
									<h1 class="fw-bold text-dark mb-9">@if(isset($product)) Edit Product @else Add Product @endif</h1>
									<div class="row mb-5">
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Product Name</label>
											<input type="text" class="form-control form-control-solid" placeholder="Enter product Name" name="product_name" @if(isset($product)) value="{{$product->product_name}}" @endif>
										</div>
										
									</div>

									<div class="row mb-5">
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Product Description</label>
											<input type="text" class="form-control form-control-solid" placeholder="Enter product Description" name="description" @if(isset($product)) value="{{$product->description}}" @endif>
										</div>
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Product Price ( ₹ )</label>
											<input type="number" class="form-control form-control-solid" placeholder="Enter Price" name="price" @if(isset($product)) value="{{$product->price}}" @endif>
										</div>
										
									</div>
									
									<div class="row mb-5">
										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Category</label>
											<select class="form-select form-select-solid" data-kt-select2="true" required name="category_id" data-placeholder="Select Category">
												<option value="">Select Category</option>
												@foreach($category as $cat)
												 <option value="{{$cat->id}}" @if(isset($product)) @if($cat->id == $product->category_id)  {{'selected'}} @endif @endif>{{$cat->cat_name}}</option>
												@endforeach
											</select>
										</div>

										<div class="col-md-6 fv-row">
											<label class="fs-5 fw-semibold mb-2">Color</label>
											<select class="form-select form-select-solid" data-kt-select2="true" required name="color_id" data-placeholder="Select Color">
												<option value="">Select Color</option>
												@foreach($color as $col)
												 <option value="{{$col->id}}" @if(isset($product)) @if($col->id == $product->color_id)  {{'selected'}} @endif @endif>{{$col->color_name}}</option>
												@endforeach
											</select>
										</div>

										<div class="d-flex flex-column mb-10 fv-row">
											<label class="fs-6 fw-semibold mb-2">Product Image</label>
										  	<input type="file" class="form-control form-control-solid" placeholder="Select File" name="image" @if(!isset($product)) required  @endif accept=".png,.jpg">
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
	        product_name: {
	            required: true
	        },
	        category_id: {
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






