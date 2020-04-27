<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/croppie.js') }}" defer></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/nav.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">

</head>
<body>
    <!-- #wrapper -->
    <div class="d-flex" id="wrapper">
        <div class="sticky-top">
       @include('inc.navbar') 
        </div>
        <!-- #Page Content -->
    <div id="page-content-wrapper" style="height: 100%;">
        @include('inc.subnavbar')
        @yield('content')
    </div>
    <!-- /#Page Content -->
    <!-- /#wrapper -->

 
</body>


</html>
