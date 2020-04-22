<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">

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
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>


</html>
