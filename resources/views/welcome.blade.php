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
    <!-- Services-->
        <section id="services" class="Services">
            <services></services>
        </section>
    <!-- Motivation-->
    <section id="motivation">
        <Motivation></Motivation>
    </section>
    <!-- Footer-->
    <section style="  transform: rotateX(180deg); margin-top: 200px">
        <footer-com>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Contact Us</h1>
                        <form method="psot" action="">
                            @csrf
                            <div class="form-group w-75">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group w-75">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mt-4">
                                <button class="btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 text-center my-auto " style="position: relative;">
                        <div class="Brand mx-auto" style="height: 200px;width: 200px"></div>
                    </div>

                </div>

            </div>

        </footer-com>
    </section>

</div>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>
