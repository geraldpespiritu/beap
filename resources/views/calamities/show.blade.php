@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="http://localhost:85/beap/public/calamities" class="btn btn-light">Go back</a>
                    <br/><br/>
                        <div class="card">
                            <div class="card-header">{{$calamity->name}}</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <font color="#f08080"> Calamity Name: </font>
                                            </td>
                                            <td>
                                                {{$calamity->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font color="#f08080"> Calamity Description:</font>
                                            </td>
                                            <td>
                                                {!! $calamity->description!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font color="#f08080"> Calamity Priority: </font>
                                            </td>
                                            <td>
                                                {!! $calamity->priority!!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <font color="#f08080"> Calamity Image: </font>
                                            </td>
                                            <td>
                                                <img style="width:50%" src="{{ asset('storage/calamity_images/' . $calamity->image) }}" />

                                            </td>
                                        </tr>



                                    </table>
                                        <hr/>
                                            <small>Written on {{$calamity->created_at}} by {{$calamity->user->name}}</small>
                                                <BR/>
                                            <small>Updated on {{$calamity->updated_at}} by {{$calamity->user->name}}</small>
                                        <hr/>
                                </div>
                            </div> <br/>
                                <table>
                                    <tr>
                                        @if(!Auth::guest())
                                            @if(Auth::user()->id == $calamity->user_id)
                                                <td>
                                                    <a href="http://localhost:85/beap/public/calamities/{{$calamity->calamityID}}/edit" class="btn btn-light">Edit Calamity</a>
                                                </td>
                                                <td>
                                                    {!! Form::open(['action' => ['CalamitiesController@destroy', $calamity->calamityID], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                    {!! Form::close() !!}
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