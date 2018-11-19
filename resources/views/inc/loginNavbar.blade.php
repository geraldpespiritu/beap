{{--Got the code from: view-source:http://getbootstrap.com/docs/4.1/examples/starter-template/--}}

<nav class="navbar navbar-expand-md">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'De La Salle-College of Saint Benilde' }}
                </a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'Benilde Emergency Application' }}
                </a>
            </ul>
            {{--@endguest--}}
        </div>
    </div>
</nav>