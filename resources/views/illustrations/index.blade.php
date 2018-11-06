@extends('layouts.app')

@section('content')
    <br/>
    <h1 style="text-align:center">Illustrations</h1>

    <div class="card-body">
        <a href="http://localhost:85/beap/public/illustrations/create" class="btn btn-warning">Add Illustration</a>
    </div>
    @if(count($illustrations) > 0)
        @foreach($illustrations as $illustration)
            <div class="well list-group-item">

                <div class="row">
                    <div class="col-sm-3">
                        <img style="width:50%" src="storage/illustration_images/{{$illustration->illustrationImage}}">
                    </div>

                    <div class="col-sm-6">
                        <h3><a href="/illustrations/{{$illustration->illustrationID}}"> {{$illustration->illustrationName}}</a></h3>
                        <small>Written on {{$illustration->created_at}} by {{$illustration->user->name}}</small>
                    </div>
                </div>

            </div>
            <br/>
        @endforeach
        {{-- use PAGINATE on PostsController--}}
        {{$illustrations->links()}}
    @else
        <p>No illustrations found</p>
    @endif
@endsection