@extends('frontend.layouts.master')

@section('content')
<div class="container py-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                        
                            <!--begin::Form-->
                            <!-- <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#"> -->
                            <form class="form"  method="POST" action="{{ route('custom_login') }}">
                                    @csrf
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bolder mb-3">Login</h1>
                                    <!--end::Title-->
                                </div>

                                @if(Session::has('error'))
                                 <div class="alert alert-danger">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 {{ Session::get('error') }}
                                 </div>
                                @endif
                                <!-- @if(Session::has('error'))
                                 <div class="alert alert-success">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 {{ Session::get('error') }}
                                 </div>
                                @endif -->
                                
                               
                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                     <input placeholder="Enter Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <!--end::Email-->
                                </div>
                                <br>
                                <!--end::Input group=-->
                                <div class="fv-row mb-3">
                                    <!--begin::Password-->
                                    <input placeholder="Enter Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <!--end::Password-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <!--begin::Link-->
                                    {{-- <a href="" class="link-primary">Forgot Password ?</a> --}}
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">Login</button>
                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center">Not a User yet?
                                <a href="{{url('/user_register')}}" class="link-primary">Register</a></div>
                                <!--end::Sign up-->
                            </form>
                            <!--end::Form-->
                </div>
            </div>
        </div>
     </div>
</div>
@endsection
