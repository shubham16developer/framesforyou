@extends('layouts.master')

@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Roles</h1>
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
					<li class="breadcrumb-item text-muted">Roles and Permissions</li>
					<!--end::Item-->
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			<!--begin::Actions-->
			@if(Auth::user()->role == 'Admin')
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<!--begin::Primary button-->
				<a href="{{url('roles-permission/add')}}" class="btn btn-sm fw-bold btn-primary" >Add Roles</a>
				<!--end::Primary button-->
			</div>
			@endif
			<!--end::Actions-->
		</div>
		<!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container container-xxl">

			<div class="card">
				<!--begin::Header-->
				<div class="card-header card-header-stretch">
					<!--begin::Title-->
					<div class="card-title">
						<h3 class="m-0 text-gray-800">Roles</h3>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Tab Content-->
				<div id="kt_referred_users_tab_content" class="tab-content" style="padding:15px;">
					<!--begin::Tab panel-->
					<div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
						<div class="table-responsive">
							<!--begin::Table-->
							<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9" 
							 id="myTable">
								<!--begin::Thead-->
								<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
									<tr>
										<th class="min-w-175px ps-9">RoleName</th>
										<th class="min-w-125px text-center">Action</th>
									</tr>
								</thead>
								<!--end::Thead-->
								<!--begin::Tbody-->
								<tbody class="fs-6 fw-semibold text-gray-600">
									<tr>
										<td>Admin</td>
										
										<td class="text-center">
										
											
											<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn_delete">
												<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
												<span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
														<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
														<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
										</td>
									</tr>


									<tr>
										<td>Manager</td>
										
										<td class="text-center">
										
											<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn_delete">
												<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
												<span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
														<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
														<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
										</td>
									</tr>


									<tr>
										<td>User</td>
										
										<td class="text-center">
										
											<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn_delete">
												<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
												<span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
														<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
														<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
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

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	});


	$(document).on('click', '.btn_delete', function(event) {
		event.preventDefault();
		/* Act on the event */
		swal({
			title: "Are you sure?",
			text: "Are you sure you want to delete this Role?",
			icon: "warning",
			buttons: ["No", "Yes"],
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				swal("Role has been Deleted!", {
					icon: "success",
				});
			} else {
				swal("Your Role is Safe!");
			}
		});
	});
</script>

@endpush
