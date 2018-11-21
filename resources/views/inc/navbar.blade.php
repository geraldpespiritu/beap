{{--Got the code from: view-source:http://getbootstrap.com/docs/4.1/examples/starter-template/--}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<nav class="navbar navbar-expand-md">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <h5 class="navbar-brand">
                    {{ 'De La Salle-College of Saint Benilde' }}
                </h5>
            </ul>
       {{-- @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

            @else--}}
            <ul class="navbar-nav mr-auto">
                <li class="active">
                    <a class="nav-link" href="/dashboard">Display Users</a>
                </li>
                {{--    <li class="active">
                        <a class="nav-link" href="http://localhost:85/beap/public/">Home </a>
                    </li>
                <li class="active">
                    <a class="nav-link" href="http://localhost:85/beap/public/about">About</a>
                </li>
                <li class="active">
                    <a class="nav-link" href="http://local  host:85/beap/public/services">Services</a>
                </li>--}}
                <li class="active">
                    <a class="nav-link" href="/calamities">Calamities</a>
                </li>
                <li class="active">
                    <a class="nav-link" href="/report">Reports</a>
                </li>
            </ul>


            <!-- Right Side Of Navbar -->

            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                {{--@guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else--}}
                <h5>{{session('username')}}</h5>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="/dashboard">Dashboard</a>


                        </div>
                    </li>
                {{--@endguest--}}
            </ul>
            {{--@endguest--}}
        </div>
    </div>
</nav>