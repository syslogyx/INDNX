
<header>
        <div class="fixed full-width" data-aos-offset="1200" data-aos-easing="ease-in-sine" style="z-index: 998;">
            <nav class=" grey darken-3">
                <div class="nav-wrapper container">
                    <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large grey-text text-darken-2">
                        <i class="material-icons">menu</i>
                    </a>
                    <a href="http://indnx.in/" class="brand-logo black-text">
                        <img src="{{URL::asset('assets/images/logo3.png')}}">
                    </a>
                    <ul class="right hide-on-med-and-down">
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
                        <!-- <li>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSflknuu8Esr3qxolWBlCfAs5ETjyBcJklXTRfZKkd1khLGVVA/viewform" class="btn orange white-text" target="_blank">Register</a>
                            <li><a class="btn orange white-text" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        </li> -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a class="btn orange white-text" href="{{ route('register') }}">Register</a></li>
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
                <a class="waves-effect" href="http://indnx.in/faq.html">FAQ</a>
            </li>
        </ul>









    </header>