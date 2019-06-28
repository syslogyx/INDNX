<style>
    a{
        text-decoration: none !important;
    }
    li#register:hover, #navig:hover, li#login:hover {
        background-color: #001a47;
        color: white;
    }
</style>

<header>
        <div class="fixed full-width" style="z-index: 998;">
            <nav class="dark_blue" >
                <div class="nav-wrapper container" >
                    <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large grey-text text-darken-2">
                        <i class="material-icons">menu</i>
                    </a>
                    <a href="http://indnx.in/index.html" class="brand-logo black-text">
                        <img src="{{URL::asset('assets/images/logo3.png')}}" style="margin-bottom: 15px">
                    </a>
                    <ul class="right hide-on-med-and-down headerMenu">
                        <li class="headerMenuLi">
                            <a class="waves-effect waves-orange" href="http://indnx.in/index.html" id="navig">Home</a>
                        </li>
                        <li class="headerMenuLi">
                            <a class="waves-effect waves-orange " href="http://indnx.in/hackathon.html">Hackathon</a>
                        </li>
                        <li class="headerMenuLi">
                            <a class="waves-effect waves-orange " href="http://indnx.in/conference.html">Conference</a>
                        </li>
                        <li class="headerMenuLi">
                            <a class="waves-effect waves-orange " href="http://indnx.in/contact.html">Contact</a>
                        </li>
                        <li>
                            <a class="waves-effect waves-orang" href="http://indnx.in/faq.html">FAQ<span style="font-size: 13px;">s</span></a>
                        </li>
                        <!-- <li class="menu">
                            <a href="http://indnx.in/app/public/login" class="btn heading_blue strong " target="_blank" style="background-color:#ffe028;">Login</a>
                        </li>
                        <li class="menu">
                            <a href="http://indnx.in/app/public/register" class="btn heading_blue strong " target="_blank" style="background-color:#ffe028;">Register</a>
                        </li> -->

                         @guest
                            <!-- <li><a href="{{ route('login') }}">Login</a></li> -->
                            <li id="login"><a href="{{ route('login') }}" class="btn heading_blue strong " style="background-color:#ffe028;">Login</a></li>
                            <li id="register"><a class="btn heading_blue strong" style="background-color:#ffe028;" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="dropdown-trigger dropdown-trigger1" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                        @endguest
                    </ul>
                    <ul id="dropdown1" class="dropdown-content nested">
                        <li>
                        <a href="{{ route('logout') }}">logout</a>
                        </li>
                        <li>
                            <a href="/app/public/changePassword">Change Password</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Mobile menu -->

        <ul id="slide-out" class="sidenav">
            <li>
                <a class="waves-effect" href="http://indnx.in/index.html">Home</a>
            </li>
            <li>
                <a class="waves-effect" href="http://indnx.in/hackathon.html">Hackathon</a>
            </li>
            <li>
                <a class="waves-effect" href="http://indnx.in/conference.html">Conference</a>
            </li>
            <li>
                <a class="waves-effect" href="http://indnx.in/contact.html">Contact</a>
            </li>
            <li>
                <a class="waves-effect" href="http://indnx.in/faq.html">FAQ<span style="font-size: 13px">s</span></a>
            </li>
            <!-- <li class="menu">
                <a href="http://indnx.in/app/public/login" class="btn heading_blue strong" style="background-color:#ffe028;">Login</a>
            </li>
            <li class="menu">
                <a href="http://indnx.in/app/public/register" class="btn heading_blue strong" style="background-color:#ffe028;">Register</a>
            </li> -->

            @guest
                <li id = "login" ><a href="{{ route('login') }}" class="btn heading_blue strong" style="background-color:#ffe028;">Login</a></li>
                
                <li id="register"><a class="btn heading_blue strong" style="background-color:#ffe028;" href="{{ route('register') }}">Register</a></li>
            @else
                <li><a class="dropdown-trigger dropdown-trigger1" href="#!" data-target="dropdown2">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
        </ul>
        <ul id="dropdown2" class="dropdown-content nested">
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
            <li>
                <a href="/app/public/changePassword">Change Password</a>
            </li>
        </ul>
    </header>

    <style type="text/css">
        .dropdown-content.nested {
           overflow-y: visible;
        }

        .dropdown-content {
           margin-top:65px;
        }
        .dropdown-content li{
            min-height : 35px;
        }
        .dropdown-content li>a, .dropdown-content li>span{
            font-size: 13px;
            padding: 8px 16px;
        }
    </style>
    <script type="text/javascript">
        $(".dropdown-trigger1").dropdown();
        $(".dropdown-trigger2").dropdown();
        if(window.location.pathname == "/register" || window.location.pathname == "/app/public/register"){
            $("#login").removeClass("active");
            $("#register").addClass("active");
        } 

        if(window.location.pathname == "/login" || window.location.pathname == "/app/public/login"){
            $("#register").removeClass("active");
            $("#login").addClass("active");
        }
    </script>