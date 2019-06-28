<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!--  <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>IndNX 4.0 </title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/hackathon.css')}}">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/aos.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/tilt.jquery.min.js')}}"></script>
    <!-- Jquery Plugin CDN -->
    
    <style>
    .body-contents{min-height: 500px;}
    </style>
    <!-- Added Validation Plugin -->
    <script type="text/javascript" src="{{URL::asset('assets/plugin/validate/jquery.validate.min.js')}}"></script>
    <!-- Added Common Validaiton File -->
    <script type="text/javascript" src="{{URL::asset('assets/js/validation.js')}}"></script>
    <!-- Added Common Script File -->
    <script type="text/javascript" src="{{URL::asset('assets/js/script.js')}}"></script>
    <!-- Added Sweet alert plugin Plugin -->
    <script type="text/javascript" src="{{URL::asset('assets/plugin/sweetalert/sweetalert.min.js')}}"></script>

</head>
@include('header')
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel dark_blue">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    IndNX 4.0
                </a>
                
                
            </div>
        </nav>
<div class="body-contents">
@yield('content')
</div>
        
    </div>
@include('footer')
    <!-- Scripts -->
<!--   <script src="{{ asset('js/app.js') }}"></script>-->
    <script src="{{ asset('js/myapp.js') }}"></script>
    <script>
        var elem = document.querySelector('.collapsible.expandable');
        var instance = M.Collapsible.init(elem, {
            accordion: false
        });

        /*$(document).ready(function() {


            $('.prize').tilt({
                maxTilt: 25,
                scale: 1.05, // 2 = 200%, 1.5 = 150%, etc..
                glare: false, // Enables glare effect
                //maxGlare: 0.4 // From 0 - 1.
            });
    });*/
    </script>
</body>
</html>
