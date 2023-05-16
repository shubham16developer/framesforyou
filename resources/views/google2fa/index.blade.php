@extends('layouts.app')

@section('content')
    <html lang="en">
    <!--begin::Head-->

    <head>
        <base href="../../../" />
        <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular & Laravel by
            Keenthemes</title>
        <meta charset="utf-8" />
        <meta name="description"
            content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords"
            content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Keenthemes | Metronic" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
        <!--begin::Theme mode setup on page load-->
        <script>
            var defaultThemeMode = "light";
            var themeMode;
            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-theme-mode");
                } else {
                    if (localStorage.getItem("data-theme") !== null) {
                        themeMode = localStorage.getItem("data-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-theme", themeMode);
            }
        </script>
        <!--end::Theme mode setup on page load-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!--begin::Page bg image-->
            <style>
                body {
                    background-image: url('{{ asset('media/auth/bg4.jpg') }}');
                }

                [data-theme="dark"] body {
                    background-image: url('{{ asset('media/auth/bg4-dark.jpg') }}');
                }
            </style>
            <!--end::Page bg image-->
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-center flex-column-fluid flex-lg-row w-50" style="margin: 0 auto">
                <!--begin::Aside-->

                <!--begin::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-center w-100 p-10">
                    <!--begin::Card-->
                    <div class="card card-default w-100" >
                        {{-- <h4 class="card-heading text-center mt-4">Set up Google Authenticator</h4> --}}

                        <div class="card-body" style="text-align: center;">
                            <div class="panel panel-default">
                                <div class="panel-heading " style="font-weight: 700;font-size:20px;">Login</div>
                                <hr>
                                @if ($errors->any())
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first() }}</strong>
                                        </div>
                                    </div>
                                @endif
            
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                                        {{ csrf_field() }}
            
                                        <div class="form-group">
                                            <p>Please enter the <strong>OTP</strong> generated on your Authenticator App. <br> Ensure
                                                you submit the current one because it refreshes every 30 seconds.</p>
                                            <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>
            
            
                                            <div class="col-md-6 offset-3">
                                                <input id="one_time_password" type="text" class="form-control"
                                                    name="one_time_password" required autofocus>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <div class="col-md-6 offset-3 mt-3">
                                                <button type="submit" class="btn btn-primary"> 
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Root-->
        <!--begin::Javascript-->
        <script>
            var hostUrl = "assets/";
        </script>
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Custom Javascript(used for this page only)-->
        {{-- <script src="assets/"></script> --}}
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->

    </html>
    
@endsection
