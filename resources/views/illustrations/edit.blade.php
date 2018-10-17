@extends('layouts.app')

@section('content')
    <br/>
    <h1>Modify Illustration</h1>
    {!! Form::open(['action' => ['IllustrationsController@update', $illustration->illustrationID], 'method' => 'POST']) !!}
    <div class ="form-group">
        {{Form::label('illustrationName', 'Illustration Name')}}
        {{Form::text('illustrationName', $illustration->illustrationName, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    <div class ="form-group">
        {{Form::label('illustrationDescription', 'Description of the Calamity')}}
        {{Form::textarea('illustrationDescription', $illustration->illustrationDescription, [/*'id' => 'editor1',*/'class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    <div class="form-group">
        {{Form::file('illustration_image')}}
    </div>


    {{Form::hidden('_method', 'PUT')}}

    {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection