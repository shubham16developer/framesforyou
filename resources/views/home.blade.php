@extends('layouts.master')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboard</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <select class="form-select" data-kt-select2="true" data-placeholder="Select Filter">
                        <option></option>
                        <option value="1">All</option>
                        <option value="2">This Week</option>
                        <option value="2">This Month</option>
                        <option value="2">First Quarter</option>
                        <option value="2">Second Quarter</option>
                        <option value="2">Third Quarter</option>
                        <option value="2">Fourth Quarter</option>
                        <option value="2">Last Year</option>
                    </select>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->

                    <div class="col-md-4 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10" style="background-color: #F1416C;background-image:url('{{asset('media/patterns/vector-1.png')}}')">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Today’s total calls</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    </div>
                                    <div class="h-8px mx-3 w-100">
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 20-->
                        <!--begin::Card widget 7-->  
                    </div>


                    <div class="col-md-4 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10" style="background-color:  #1E90FF;background-image:url('assets/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Incoming calls</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    </div>
                                    <div class="h-8px mx-3 w-100">
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 20-->
                        <!--begin::Card widget 7-->  
                    </div>


                    <div class="col-md-4 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10" style="background-color: #FFA500;background-image:url('assets/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Outgoing calls</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    </div>
                                    <div class="h-8px mx-3 w-100">
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 20-->
                        <!--begin::Card widget 7-->  
                    </div><div class="col-md-4 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10" style="background-color: #3699FF;background-image:url('assets/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Missed calls</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    </div>
                                    <div class="h-8px mx-3 w-100">
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 20-->
                        <!--begin::Card widget 7-->  
                    </div>

                    <div class="col-md-4 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10" style="background-color: #2ed8b6;background-image:url('assets/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Total User</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    </div>
                                    <div class="h-8px mx-3 w-100">
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 20-->
                        <!--begin::Card widget 7-->  
                    </div>

                    <div class="col-md-4 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 20-->
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10" style="background-color:  #236262;background-image:url('assets/media/patterns/vector-1.png')">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">0</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Total Manager</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    </div>
                                    <div class="h-8px mx-3 w-100">
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 20-->
                        <!--begin::Card widget 7-->  
                    </div>


                    <div class="row gy-5 g-xl-12">
                        <div class="col-xl-12">
                            <!--begin::Tables Widget 9-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">User with the highest number of Calling</span>
                                        
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-140px">Group Name</th>
                                                <th class="min-w-120px">Incoming calls</th>
                                                <th class="min-w-120px">Outgoing calls</th>
                                                <th class="min-w-120px">Missed calls</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr><td>No record found</td></tr>


                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 9-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Col-->


                    <div class="row gy-5 g-xl-12">
                        <div class="col-xl-12">
                            <!--begin::Tables Widget 9-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Manager with the highest number of Calling</span>
                                        
                                    </h3>

                                     <div class="col-md-3 d-flex align-items-center gap-2 gap-lg-3" >
                                        <!--begin::Secondary button-->
                                        <select class="form-select" data-kt-select2="true" data-placeholder="Select User">
                                            <option></option>
                                            <option value="1">All</option>
                                            <option value="2">Test</option>
                                            <option value="2">Demo</option>
                                            <option value="2">Demo 1</option>
                                            <option value="2">Demo 2</option>
                                            <option value="2">Test 1</option>
                                        </select>
                                        <!--end::Primary button-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                
                                <div class="row mb-5">

                                    <!--begin::Actions-->
                                   {{--  <div class="col-md-3 d-flex align-items-center gap-2 gap-lg-3" style="margin-left: 30px;">
                                        <!--begin::Secondary button-->
                                        <select class="form-select" data-kt-select2="true" data-placeholder="Select User">
                                            <option></option>
                                            <option value="1">All</option>
                                            <option value="2">Test</option>
                                            <option value="2">Demo</option>
                                            <option value="2">Demo 1</option>
                                            <option value="2">Demo 2</option>
                                            <option value="2">Test 1</option>
                                        </select>
                                        <!--end::Primary button-->
                                    </div> --}}
                                    <!--end::Actions-->


                                    <!--begin::Actions-->
                                   {{--  <div class="col-md-3 d-flex align-items-center gap-2 gap-lg-3" style="margin-left: 30px;">
                                        <!--begin::Secondary button-->
                                        <select class="form-control" name="user">
                                            <option >Select User</option>
                                            <option value="2">Test</option>
                                            <option value="2">Demo</option>
                                            <option value="2">Demo 1</option>
                                            <option value="2">Demo 2</option>
                                            <option value="2">Test 1</option>
                                        </select>
                                        <!--end::Primary button-->
                                    </div> --}}
                                    <!--end::Actions-->
                                      
                                    </div>


                                

                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-140px">Group Name</th>
                                                <th class="min-w-140px">User Name</th>
                                                <th class="min-w-120px">Incoming calls</th>
                                                <th class="min-w-120px">Outgoing calls</th>
                                                <th class="min-w-120px">Missed calls</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr><td>No record found</td></tr>


                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 9-->
                        </div>
                        <!--end::Col-->
                    </div>




                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <!--end::Row-->
                <!--begin::Row-->
                <!--end::Row-->
                <!--begin::Row-->
                <!--end::Row-->
                <!--begin::Row-->

                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <!--end::Footer-->
</div>

@endsection





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
