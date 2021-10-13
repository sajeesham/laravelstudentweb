<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Web</title>

    <link rel="stylesheet" href="{{ asset('assets/remark/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/css/site.min.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/examples/css/pages/login.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/remark/global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    @yield('style')
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/remark/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ asset('assets/remark/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{ asset('assets/remark/global/vendor/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <style>
        .btn-primary{
            background: #00bcd4;
            border-color: #00bcd4;
        }
    </style>
    <script>
        Breakpoints();
    </script>
</head>
<body class="@yield('bodyClass')">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
     data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
        @yield('content')
        @include('auth.layouts.footer')
    </div>
</div>
<!-- End Page -->
<!-- Core  -->
<script src="{{ asset('assets/remark/global/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/asscroll/jquery-asScroll.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/asscrollable/jquery.asScrollable.all.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/waves/waves.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('assets/remark/global/vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('assets/remark/global/js/core.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/site.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/sections/menu.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/sections/menubar.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/sections/gridmenu.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/sections/sidebar.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/configs/config-colors.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/configs/config-tour.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/asscrollable.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/animsition.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/slidepanel.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/switchery.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/tabs.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/jquery-placeholder.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/components/material.js') }}"></script>
<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>
@yield('scripts')
</body>
</html>
