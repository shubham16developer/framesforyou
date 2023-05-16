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
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            @if (isset($security))
                                Edit Security
                            @else
                                Add Security
                            @endif
                        </h1>
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
                            <li class="breadcrumb-item text-muted">Security</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>

                    <a href="{{ url('security') }}" class="btn btn-danger font-weight-bolder btn-sm">Back</a>

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
                                    <form                  
                                        action="@if (isset($security)) {{ route('update_security', base64_encode($security->id)) }} @else {{ route('store_security') }} @endif"
                                        class="form mb-15" id="kt_contact_form" method="POST">
                                        @csrf
                                        <h1 class="fw-bold text-dark mb-9">
                                            @if (isset($security))
                                                Edit security
                                            @else
                                                Add security
                                            @endif
                                        </h1>
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-semibold mb-2">IP</label>
                                                <input type="text" class="form-control form-control-solid" required
                                                    placeholder="Enter Accessible IP" name="ip"
                                                    @if (isset($security)) value="{{ $security->ip }}" @endif />
                                            </div>
                                        </div>

                                        <button style="float:right;" type="submit" class="btn btn-primary">
                                            <!--begin::Indicator label-->
                                            <span class="indicator-label">Submit</span>

                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Contact-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
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
        $('#kt_contact_form').validate({
            rules: {
                first_name: {
                    required: true
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
