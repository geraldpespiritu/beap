{{--Got the code from: view-source:http://getbootstrap.com/docs/4.1/examples/starter-template/--}}

{{--
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost:85/beap/public/">{{config('app.name', 'BEAP')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="active">
                <a class="nav-link" href="http://localhost:85/beap/public/">Home </a>
            </li>
            <li class="active">
                <a class="nav-link" href="http://localhost:85/beap/public/about">About</a>
            </li>
            <li class="active">
                <a class="nav-link" href="http://localhost:85/beap/public/services">Services</a>
            </li>
            <li class="active">
                <a class="nav-link" href="http://localhost:85/beap/public/posts">Blog</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

        </ul>

    </div>
</nav>
--}}

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
        @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

            @else
            <ul class="navbar-nav mr-auto">
                <li class="active">
                    <a class="nav-link" href="/beapDashboard">BEAP Dashboard </a>
                </li>
                {{--    <li class="active">
                        <a class="nav-link" href="http://localhost:85/beap/public/">Home </a>
                    </li>
                <li class="active">
                    <a class="nav-link" href="http://localhost:85/beap/public/about">About</a>
                </li>
                <li class="active">
                    <a class="nav-link" href="http://localhost:85/beap/public/services">Services</a>
                </li>--}}
                <li class="active">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
                <li class="active">
                    <a class="nav-link" href="/calamities">Calamities</a>
                </li>
                <li class="active">
                    <a class="nav-link" href="/illustrations">Illustrations</a>
                </li>
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
                @endguest
            </ul>
            @endguest
        </div>
    </div>
</nav>