<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

</head>
<body>
    <div id="page-wrapper">
    <!-- Header -->
        <div id="header-wrapper">
            <header id="header" class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Logo -->
                            <h1><a href="{{action('FrontController@index')}}" id="logo">На головну</a></h1>

                        <!-- Nav -->
                            <nav id="nav">
                                <a href="{{action('ReportController@create1')}}">Створити щоденний звіт</a>
                                <a href="{{action('GroupController@index')}}">Керування групами</a>
                            @if (Auth::guest())
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a> 
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            @endif 
                            </nav>

                    </div>
                </div>
            </header>
        </div>

            

<!-- Content -->

 @yield('content')
                            

            <!-- Footer -->
                <div id="footer-wrapper">
                    <footer id="footer" class="container">
                        <div class="row">
                            <div class="8u 12u(mobile)">

                                <!-- Links -->
                                    <section>
                                        <h2>Links to Important Stuff</h2>
                                        <div>
                                            <div class="row">
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                                <div class="3u 12u(mobile)">
                                                    <ul class="link-list last-child">
                                                        <li><a href="#">Neque amet dapibus</a></li>
                                                        <li><a href="#">Sed mattis quis rutrum</a></li>
                                                        <li><a href="#">Accumsan suspendisse</a></li>
                                                        <li><a href="#">Eu varius vitae magna</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                            </div>
                            <div class="4u 12u(mobile)">

                                <!-- Blurb -->
                                    <section>
                                        <h2>An Informative Text Blurb</h2>
                                        <p>
                                            Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu
                                            varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi,
                                            dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh
                                            lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
                                        </p>
                                    </section>

                            </div>
                        </div>
                    </footer>
                </div>

            <!-- Copyright -->
                <div id="copyright">
                    &copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
                </div>

        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="{{asset('js/skel.min.js')}}"></script>
    <script src="{{asset('js/skel-viewport.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/myFunction.js')}}"></script>
    

</body>
</html>
