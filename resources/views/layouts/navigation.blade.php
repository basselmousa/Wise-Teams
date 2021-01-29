<nav class="navbar welcome-nav navbar-expand-md  shadow-sm" style="z-index: 13445345345;">
    <div class="container">
        <a class="navbar-brand Logo-brand" style="background-image: url('{{asset("images/Logos/Main-Logo.png")}}')"
           href="{{ url('/') }}">

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#723BE4 "></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="z-index: 1000000000">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="ml-4"><a href="/#about">About</a></li>
                <li class="ml-4"><a href="/#services">Services</a></li>
                <li class="ml-4"><a href="/#motivation">Motivation</a></li>
                <li class="ml-4"><a href="/#contact">Contact Us</a></li>
                @if(auth()->user())
                    <li class="ml-4"><a href="/home">Home</a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}

                    <li class="nav-item dropdown username">
                        <a style="font-size: 14px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fullname }}
                            <i class="fas fa-caret-square-down ml-2"></i>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
