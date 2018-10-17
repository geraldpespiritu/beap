@extends('layouts.app')

@section('content')
    <br/>
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well list-group-item">

                <div classs="col-md-4 col-sm-4">
                    <img style="width:20%" src="storage/illustration_images/{{$post->illustration_image}}">
                </div>

                <div classs="col-md-8 col-sm-8">
                    <h3><a href="http://localhost:8080/beap/public/posts/{{$post->id}}"> {{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    <hr/>
                    <small>Status {{$post->user->userStatus}}</small>
                </div>


            </div>
            <br/>
            @endforeach
        {{-- use PAGINATE on PostsController--}}{{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif

    <div classs="col-md-8 col-sm-8">
        <table>
            <tr>
               <th>Sample Dashboard</th>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>Created on</td>
                <td>Status</td>
            </tr>
            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->user->created_at}}</td>
                <td>{{$post->user->userStatus}}</td>
            </tr>

        </table>


    </div>

@endsection