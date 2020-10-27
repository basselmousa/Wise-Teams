<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tap Icon -->
    <link rel="icon" href="{{asset('/images/logos/Main-Logo.png')}}">
    <!-- font api -->
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- Style-->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Home</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

</head>
<body>
@include('layouts.navigation')
<div id="app">
    <!-- Header-->
        <header style="position: relative; top: -50px; height: 94vh" >
            <wave-background></wave-background>
        </header>
    <!-- About Wise-->
        <section id="about" class="About mt-5">
            <about-wise></about-wise>

        </section>



</div>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>
