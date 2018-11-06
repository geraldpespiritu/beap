@extends('layouts.app')

@section('content')
    @guest

        <br/>
        <div class="jumbotron text-center">
            <h1>Welcome to BEAP</h1>
            <p>This is the De La Salle-College of Saint Benilde Emergency Application</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}">{{ __('Login') }}</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}">{{ __('Register') }}</a></p>
        </div>

    @elseguest

        <h1>Logged in</h1>

    @endguest
@endsection

