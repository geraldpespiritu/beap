@extends('layouts.app')

@section('content')
    <br/>
    <a href="http://localhost:8080/beap/public/posts" class="btn btn-light">Go back</a>
    <br/><br/>
    <h1>{{$post->title}}</h1>
    <div>
        <h5>{!! $post->body!!}</h5>
    </div>
    <div classs="col-md-4 col-sm-4">
        <img style="width:20%" src="{{ asset('storage/illustration_images/' . $post->illustration_image) }}">
    </div>
    <hr/>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr/>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="http://localhost:8080/beap/public/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a>
            <br/><br/>
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection