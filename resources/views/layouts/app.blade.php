<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tap Icon -->
    <link rel="icon" href="{{asset('/images/logos/Main-Logo.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tap Icon-->
    <link rel="icon" href="{{asset('/images/logos/Main-Logo.png')}}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- font api -->
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">


    <style>
        @yield('style')
    </style>
</head>
<body>
    <div id="app">
        <div class="Main-body">
            <div class="container-fluid">
                <div class="row shadow-row">
                    <h1 class="Page-Title">@yield('nav-title')</h1>
                </div>
                @yield('content')
            </div>
        </div>

    </div>
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
