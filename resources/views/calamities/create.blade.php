@extends('layouts.app')

@section('content')
    <br/>
    <h1>Create Calamity</h1>
    {!! Form::open(['action' => 'CalamitiesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="row">

        <div class="col-md-6">
            <div class ="form-group">
                {{Form::label('name', 'Calamity Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>

            <div class ="form-group">
                {{Form::label('description', 'Description of the Calamity')}}
                {{Form::textarea('description', '', [/*'id' => 'editor1',*/'class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>

        </div>

        <div class="col-md-6">


            <div class="form-group">
                {{Form::label('image', 'Image')}}<br/>
                {{Form::file('image')}}
            </div>

            <br/>

            {{Form::submit('Submit', ['class' => 'btn btn-success'])}}

        </div>

    </div>
    {!! Form::close() !!}
@endsection