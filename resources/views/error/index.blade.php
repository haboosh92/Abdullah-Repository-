<!DOCTYPE html>
<!--
Author: AbdullahArs
Product Name: EES Version: 1.0.1
Purchase:
Website: http://www.AbdullahArs.com
Contact: support@AbdullahArs.com
Follow: www.twitter.com/AbdullahArs
Dribbble: www.dribbble.com/AbdullahArs
Like: www.facebook.com/AbdullahArs
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
@include('layouts.structure.head')
<!--end::Head-->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--begin::Body-->


<body id="kt_body" class="auth-bg bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
<script>
var defaultThemeMode = "light";
var themeMode;

if ( document.documentElement ) {
    if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
        themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
    } else {
        if ( localStorage.getItem("data-bs-theme") !== null ) {
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
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!--End::Google Tag Manager (noscript) -->
    
    <!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page bg image-->
<style>
body {
    background-image: url('{{asset('assets/media/auth/bg1.jpg')}}');
}

[data-bs-theme="dark"] body {
    background-image: url('{{asset('assets/media/auth/bg1-dark.jpg')}}');
}
</style>
<!--end::Page bg image-->


<!--begin::Authentication - Signup Welcome Message -->
<div class="d-flex flex-column flex-center flex-column-fluid">    
<!--begin::Content-->
<div class="d-flex flex-column flex-center text-center p-10">        
    <!--begin::Wrapper-->
    <div class="card card-flush w-lg-650px py-5">
        <div class="card-body py-15 py-lg-20">
            
<!--begin::Title-->
<h1 class="fw-bolder fs-2hx text-gray-900 mb-4">
    Oops!
</h1>
<!--end::Title--> 

<!--begin::Text-->
<div class="fw-semibold fs-6 text-gray-500 mb-7">
    @if (session('status') == 'error')
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
    </div>
@endif
</div>
<!--end::Text--> 

<!--begin::Illustration-->
<div class="mb-3">
    <img src="{{asset('assets/media/auth/404-error.png')}}" class="mw-100 mh-300px theme-light-show" alt="">
    <img src="{{asset('assets/media/auth/404-error-dark.png')}}" class="mw-100 mh-300px theme-dark-show" alt="">
</div>
<!--end::Illustration-->

<!--begin::Link-->
<div class="mb-0">
    <a href="{{route('research')}}" class="btn btn-sm btn-primary">Return Home</a>
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
        var hostUrl = "assets/";        </script>

                <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
                        <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
                    <!--end::Global Javascript Bundle-->
    
    
            <!--end::Javascript-->


<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" 
xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" 
style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
<defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0">
    </polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg>
</body>

</html>