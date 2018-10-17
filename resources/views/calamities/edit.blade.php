@extends('layouts.app')

@section('content')
    <br/>
    <h1>Edit Calamity</h1>
    {!! Form::open(['action' => ['CalamitiesController@update', $calamity->calamityID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class ="form-group">
        {{Form::label('name', 'Calamity Name')}}
        {{Form::text('name', $calamity->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    <div class ="form-group">
        {{Form::label('description', 'Description of the Calamity')}}
        {{Form::textarea('description', $calamity->description, [/*'id' => 'editor1',*/'class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    <div class ="form-group">
        {{Form::label('priority', 'Level of Priority')}}
        {{Form::text('priority', $calamity->priority, ['class' => 'form-control', 'placeholder' => 'Priority'])}}
    </div>

    <div class="form-group">
        {{Form::label('image', 'Image')}}<br/>
        {{Form::file('image')}}
    </div>


    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-success'])}}

    {!! Form::close() !!}
@endsection