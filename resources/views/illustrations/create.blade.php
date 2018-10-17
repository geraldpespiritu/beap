@extends('layouts.app')

@section('content')
    <br/>
    <h1>Add Illustration</h1>
    {!! Form::open(['action' => 'IllustrationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="row">

        <div class="col-md-6">
            <div class ="form-group">
                {{Form::label('name', 'Illustration Name')}}
                {{Form::text('illustrationName', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>

            <div class ="form-group">
                {{Form::label('description', 'Description of the Illustration')}}
                {{Form::textarea('illustrationDescription', '', [/*'id' => 'editor1',*/'class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('image', 'Upload Photo of Illustration')}} <br/>
                {{Form::file('illustrationImage')}}
            </div>

        <br/>

        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}

        </div>
    </div>


    {!! Form::close() !!}
@endsection