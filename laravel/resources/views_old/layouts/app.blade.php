<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">

    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/aos.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/tilt.jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/script.js')}}"></script>
</head>
@include('header')
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="waves-effect waves-orange" href="http://indnx.in/index.html" id="navig">Home</a>
                        </li>
                        <li>
                            <a class="waves-effect waves-orange" href="http://indnx.in/hackathon.html">Hackathon</a>
                        </li>
                        <li>
                            <a class="waves-effect waves-orange" href="http://indnx.in/conference.html">Conference</a>
                        </li>
                        <li>
                            <a class="waves-effect waves-orange" href="http://indnx.in/contact.html">Contact</a>
                        </li>
                        <li>
                            <a class="waves-effect waves-orange" href="http://indnx.in/faq.html">FAQ</a>
                        </li>
                        <li>
                            <!-- <a href="https://docs.google.com/forms/d/e/1FAIpQLSflknuu8Esr3qxolWBlCfAs5ETjyBcJklXTRfZKkd1khLGVVA/viewform" class="btn orange white-text" target="_blank">Register</a> -->
                            <!-- <li><a class="btn orange white-text" href="{{ route('register') }}">{{ __('Register') }}</a></li> -->
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
