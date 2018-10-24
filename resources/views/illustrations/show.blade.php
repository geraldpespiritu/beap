@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="http://localhost:85/beap/public/illustrations" class="btn btn-light">Go back</a>
                <br/><br/>
                <div class="card">
                    <div class="card-header">{{$illustration->illustrationName}}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>
                                    <font color="#f08080"> Illustration Name: </font>
                                </td>
                                <td>
                                    {{$illustration->illustratiionName}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font color="#f08080"> Illustration Description:</font>
                                </td>
                                <td>
                                    {!! $illustration->illustrationDescription!!}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <font color="#f08080"> Illustration Image: </font>
                                </td>
                                <td>
                                    <img style="width:50%"  src="{{ asset('storage/illustration_images/' . $illustration->illustrationImage) }}" />

                                </td>
                            </tr>

                        </table>
                        <hr/>
                        <small>Written on {{$illustration->created_at}} by {{$illustration->user->name}}</small>
                        <BR/>
                        <small>Updated on {{$illustration->updated_at}} by {{$illustration->user->name}}</small>
                        <hr/>
                    </div>
                </div> <br/>
                <table>
                    <tr>
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $illustration->user_id)
                                <td>
                                    <a href="http://localhost:85/beap/public/illustrations/{{$illustration->illustrationID}}/edit" class="btn btn-light">Modify Illustration</a>
                                </td>
                            @endif
                        @endif
                    </tr>
                </table>
                <br/>
            </div>
        </div>
    </div>
    </div>



@endsection