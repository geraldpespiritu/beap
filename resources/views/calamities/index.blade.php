@extends('layouts.app')

@section('content')
    <body bgcolor="#f0f8ff">
    <br/>
    <h1 style="text-align:center">Calamities</h1>

    <div class="card-body">
            <a href="http://localhost:8080/beap/public/calamities/create" class="btn btn-danger">Add Calamity</a>
    </div>
    @if(count($calamities) > 0)
        @foreach($calamities as $calamity)
            <div class="well list-group-item">

                <div class="row">
                    <div class="col-sm-3">
                        <img style="width:50%" src="storage/calamity_images/{{$calamity->image}}">
                    </div>

                <div class="col-sm-3">
                    <h3><a href="http://localhost:8080/beap/public/calamities/{{$calamity->calamityID}}"> {{$calamity->name}}</a></h3>
                    <small>Written on {{$calamity->created_at}} by {{$calamity->user->name}}</small>
                </div>

                </div>


            </div>
            <br/>
        @endforeach
        {{-- use PAGINATE on PostsController--}}
        {{$calamities->links()}}
    @else
        <p>No calamities found</p>
    @endif
@endsection

