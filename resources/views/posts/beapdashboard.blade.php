@extends('layouts.app')

@section('content')
    <br/>
    <h1>BEAPDASHBOARD</h1>

            <div class="well list-group-item">


                <div classs="col-md-8 col-sm-8">
                    <h3>{{$post->user->name}}</h3>
                    <small>Created on {{$post->user->created_at}}</small>
                    <hr/>
                    <small>Status {{$post->user->userStatus}}</small>
                </div>


            </div>
            <br/>

@endsection