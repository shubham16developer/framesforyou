@extends('layouts.master')

@push('css')
    <style type="text/css">
        .error {
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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Roles
                            and Permissions</h1>
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
                                    <form action="{{route('assign_permission')}}" class="form mb-15" id="kt_contact_form">
                                        <h1 class="fw-bold text-dark mb-9">Roles and Permissions</h1>
                                        <!--begin::Input group-->

                                        <div class="card-header border-0 pt-6 col-md-12 flex-column mb-10">
                                            <div class="role-select"
                                                style="width: 50%;display: grid;grid-template-columns: 0.2fr 0.5fr;">
                                                <label
                                                    style="line-height: 43px;font-size: 1.35rem;font-weight: 500; margin-left: -25px;">Select
                                                    Role</label>
                                                <select class="form-control" id="sel_role" name="role"
                                                    style="height: 40px">
                                                    <option value="">----Select Role----</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                            <div class="card-toolbar">




                                            </div>
                                        </div>

                                        {{-- <div class="d-flex flex-column mb-10 fv-row">
															<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
																<input class="form-check-input" style="margin-right:10px;" type="checkbox" value="">
																<span class="required">Select All</span>
															</label>
															
														</div> --}}

                                        <div class="flex-column mb-10 col-md-4 mt-5">
                                            <label class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                <input class="form-check-input border border-primary chk_permission"
                                                    name="permissions" type="checkbox" id="checkAll" value="1">
                                                <span class="fw-bold ps-2 fs-6">Select All</span>
                                            </label>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="add_group" name="add_group" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Add Group</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="edit_group" name="edit_group" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Edit Group</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="delete_group" name="delete_group" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Delete Group</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="add_user" name="add_user" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Add User</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="edit_user" name="edit_user" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Edit User</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="delete_user" name="delete_user" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Delete User</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="add_manager" name="add_manager" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Add Manager</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="edit_manager" name="edit_manager" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Edit Manager</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="delete_manager" name="delete_manager" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Delete Manager</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="add_lead" name="add_lead" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Add Lead</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="edit_lead" name="edit_lead" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Edit Lead</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="delete_lead" name="delete_lead" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Delete Lead</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="add_media" name="add_media" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Add Media</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="edit_media" name="edit_media" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Edit Media</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="delete_media" name="delete_media" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Delete Media</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        name="add_role" type="checkbox" id="add_role">
                                                    <span class="fw-bold ps-2 fs-6">Add role</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="edit_role" name="edit_role" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Edit role</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="delete_role" name="delete_role" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Delete role</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="assign_role" name="assign_role" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Assign role</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="ivr" name="ivr" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">IVR</span>
                                                </label>
                                            </div>


                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="call_log" name="call_log" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">CallLog</span>
                                                </label>
                                            </div>

                                            <div class="col-md-4 mt-5">
                                                <label
                                                    class="form-check form-check-inline form-check-solid me-5 is-invalid">
                                                    <input class="form-check-input border border-primary chk_permission"
                                                        id="whatsapp" name="whatsapp" type="checkbox">
                                                    <span class="fw-bold ps-2 fs-6">Whatsapp</span>
                                                </label>
                                            </div>


                                        </div>
                                        <button style="float:right;" type="submit" class="btn btn-primary"
                                            id="kt_contact_submit_button">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
        $("#checkAll").change(function() {
            if (!$(this).is(':checked')) {
                $('.chk_permission').prop('checked', false);
				$('#add_group').val('0');
				$('#edit_group').val('0');
				$('#delete_group').val('0');
				$('#add_user').val('0');
				$('#edit_user').val('0');
				$('#delete_user').val('0');
				$('#add_manager').val('0');
				$('#edit_manager').val('0');
				$('#delete_manager').val('0');
				$('#add_lead').val('0');
				$('#edit_lead').val('0');
				$('#delete_lead').val('0');
				$('#add_media').val('0');
				$('#edit_media').val('0');
				$('#delete_media').val('0');
				$('#add_role').val('0');
				$('#edit_role').val('0');
				$('#delete_role').val('0');
				$('#assign_role').val('0');
				$('#ivr').val('0');
				$('#call_log').val('0');
				$('#whatsapp').val('0');
            } else {
                $('.chk_permission').prop('checked', true);
				$('#add_group').val('1');
				$('#edit_group').val('1');
				$('#delete_group').val('1');
				$('#add_user').val('1');
				$('#edit_user').val('1');
				$('#delete_user').val('1');
				$('#add_manager').val('1');
				$('#edit_manager').val('1');
				$('#delete_manager').val('1');
				$('#add_lead').val('1');
				$('#edit_lead').val('1');
				$('#delete_lead').val('1');
				$('#add_media').val('1');
				$('#edit_media').val('1');
				$('#delete_media').val('1');
				$('#add_role').val('1');
				$('#edit_role').val('1');
				$('#delete_role').val('1');
				$('#assign_role').val('1');
				$('#ivr').val('1');
				$('#call_log').val('1');
				$('#whatsapp').val('1');
            }
        });

        $("#add_group").change(function() {
            var add_group = $('#add_group').val();
            if (this.checked) {
                $('#add_group').val('1');
            } else {
                $('#add_group').val('0');
            }
        });

        $("#edit_group").change(function() {
            var edit_group = $('#edit_group').val();
            if (this.checked) {
                $('#edit_group').val('1');
            } else {
                $('#edit_group').val('0');
            }
        });

        $("#delete_group").change(function() {
            var delete_group = $('#delete_group').val();
            if (this.checked) {
                $('#delete_group').val('1');
            } else {
                $('#delete_group').val('0');
            }
        });

        $("#add_user").change(function() {
            var add_user = $('#add_user').val();
            if (this.checked) {
                $('#add_user').val('1');
            } else {
                $('#add_user').val('0');
            }
        });

        $("#edit_user").change(function() {
            var edit_user = $('#edit_user').val();
            if (this.checked) {
                $('#edit_user').val('1');
            } else {
                $('#edit_user').val('0');
            }
        });

        $("#delete_user").change(function() {
            var delete_user = $('#delete_user').val();
            if (this.checked) {
                $('#delete_user').val('1');
            } else {
                $('#delete_user').val('0');
            }
        });

        $("#add_manager").change(function() {
            var add_manager = $('#add_manager').val();
            if (this.checked) {
                $('#add_manager').val('1');
            } else {
                $('#add_manager').val('0');
            }
        });

        $("#edit_manager").change(function() {
            var edit_manager = $('#edit_manager').val();
            if (this.checked) {
                $('#edit_manager').val('1');
            } else {
                $('#edit_manager').val('0');
            }
        });

        $("#delete_manager").change(function() {
            var delete_manager = $('#delete_manager').val();
            if (this.checked) {
                $('#delete_manager').val('1');
            } else {
                $('#delete_manager').val('0');
            }
        });

        $("#add_lead").change(function() {
            var add_lead = $('#add_lead').val();
            if (this.checked) {
                $('#add_lead').val('1');
            } else {
                $('#add_lead').val('0');
            }
        });

        $("#edit_lead").change(function() {
            var edit_lead = $('#edit_lead').val();
            if (this.checked) {
                $('#edit_lead').val('1');
            } else {
                $('#edit_lead').val('0');
            }
        });

        $("#delete_lead").change(function() {
            var delete_lead = $('#delete_lead').val();
            if (this.checked) {
                $('#delete_lead').val('1');
            } else {
                $('#delete_lead').val('0');
            }
        });

        $("#add_media").change(function() {
            var add_media = $('#add_media').val();
            if (this.checked) {
                $('#add_media').val('1');
            } else {
                $('#add_media').val('0');
            }
        });

        $("#edit_media").change(function() {
            var edit_media = $('#edit_media').val();
            if (this.checked) {
                $('#edit_media').val('1');
            } else {
                $('#edit_media').val('0');
            }
        });

        $("#delete_media").change(function() {
            var delete_media = $('#delete_media').val();
            if (this.checked) {
                $('#delete_media').val('1');
            } else {
                $('#delete_media').val('0');
            }
        });

        $("#add_role").change(function() {
            var add_role = $('#add_role').val();
            if (this.checked) {
                $('#add_role').val('1');
            } else {
                $('#add_role').val('0');
            }
        });

        $("#edit_role").change(function() {
            var edit_role = $('#edit_role').val();
            if (this.checked) {
                $('#edit_role').val('1');
            } else {
                $('#edit_role').val('0');
            }
        });

        $("#delete_role").change(function() {
            var delete_role = $('#delete_role').val();
            if (this.checked) {
                $('#delete_role').val('1');
            } else {
                $('#delete_role').val('0');
            }
        });

        $("#assign_role").change(function() {
            var assign_role = $('#assign_role').val();
            if (this.checked) {
                $('#assign_role').val('1');
            } else {
                $('#assign_role').val('0');
            }
        });

        $("#ivr").change(function() {
            var ivr = $('#ivr').val();
            if (this.checked) {
                $('#ivr').val('1');
            } else {
                $('#ivr').val('0');
            }
        });

        $("#call_log").change(function() {
            var call_log = $('#call_log').val();
            if (this.checked) {
                $('#call_log').val('1');
            } else {
                $('#call_log').val('0');
            }
        });

        $("#whatsapp").change(function() {
            var whatsapp = $('#whatsapp').val();
            if (this.checked) {
                $('#whatsapp').val('1');
            } else {
                $('#whatsapp').val('0');
            }
        });
    </script>
@endpush
