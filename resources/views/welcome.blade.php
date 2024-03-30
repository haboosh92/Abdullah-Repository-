<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-livestyle-extension="available" data-bs-theme="light">
<!--begin::Head-->

@include('layouts.structure.head')
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="auth-bg bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
    var defaultThemeMode = "light";
    var themeMode;

    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page bg image-->
        <style>
        body {
            background-image: url('{{ asset('assets/media/auth/bg8.jpg') }}');
        }

        [data-bs-theme="dark"] body {
            background-image: url('{{ asset('assets/media/auth/bg8-dark.jpg') }}');
        }
        </style>
        <!--end::Page bg image-->


        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center text-center p-10">
                <!--begin::Wrapper-->
                <div class="card card-flush w-md-650px py-5">
                    <div class="card-body py-15 py-lg-20">

                        <!--begin::Logo-->
                        <div class="mb-7">
                            <a href="#" class="">
                                <img alt="Logo" src="{{ asset('assets/media/logos/college.png') }}" class="h-240px">
                            </a>
                        </div>
                        <!--end::Logo-->

                        <!--begin::Title-->
                        <h1 class="fw-bolder text-gray-900 mb-5">
                            Welcome to Repository for IHCOEDU </h1>
                        <!--end::Title-->

                        <!--begin::Text-->
                        <div class="fw-semibold fs-6 text-gray-500 mb-7">
                            This is your opportunity to get creative and make a name
                            <br>
                            that gives readers an idea
                        </div>
                        <!--end::Text-->

                        <!--begin::Illustration-->
                        <div class="mb-0">
                            <img src="assets/media/auth/welcome.png" class="mw-100 mh-300px theme-light-show" alt="">
                            <img src="assets/media/auth/welcome-dark.png" class="mw-100 mh-300px theme-dark-show"
                                alt="">
                        </div>
                        <!--end::Illustration-->


                        <!--begin::Link-->
                        <div class="mb-0">
                            @if (Route::has('login'))
                            @auth

                            @if(in_array(Auth::user()->role ,['Administrator','Editor']))
                            <a href="{{ route('home') }}" class="btn btn-smx btn-primary">
                                <i class="ki-duotone ki-home">
                                </i>
                                Go To Dashboard</a>
                            @endif
                            @if(in_array(Auth::user()->role ,['Professor']))
                            <a href="{{ route('myresearch') }}" class="btn btn-smx btn-primary">
                                <i class="ki-duotone ki-home">
                                </i>
                                Go To Dashboard</a>
                            @endif


                            @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                                <i class="ki-duotone ki-security-user" style="font-size: 2rem;">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Sign In
                            </a>
                            <a href="{{ route('AuthGoogle') }}"
                                class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap wx-100"
                                style="backgrounxd-color: #dd4b39;">
                                <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}"
                                    class="h-15px me-3">

                                Sign in with google
                            </a>

                            @if (Route::has('register'))
                            {{-- <a href="{{ route('register') }}" class="btn btn-sm btn-primary">register</a> --}}
                            @endif
                            @endauth
                            @endif
                        </div>
                        <!--end::Link-->

                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Signup Welcome Message-->
    </div>
    <!--end::Root-->
    <!--end::Main-->


    <!--begin::Javascript-->
    <script>
    var hostUrl = "/metronic8/demo4/assets/";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <!--end::Javascript-->


    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>
<!--end::Body-->

</html>