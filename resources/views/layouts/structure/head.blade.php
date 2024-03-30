<head>
    <title>{{ config('app.name', 'Repository ') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="
        {{ env('APP_DESCRIPTION', ' Repository for IHCOEDU') }}
    ">
    <meta name="keywords" content="
        {{ env('APP_KEYWORDS', ' Repository , IHCOEDU') }}

    ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ config('app.name', 'Repository ') }}">
    <meta property="og:url" content="{{ config('app.url', 'Repository ') }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Repository ') }}">
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo4/authentication/general/welcome.html">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon2.ico') }}">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/ars.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Google tag-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');

    </script>
    <!--end::Google tag-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }

    </script>

    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
</head>
