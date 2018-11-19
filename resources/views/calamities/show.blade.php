@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="/calamities" class="btn btn-light">Go back</a>
                    <br/><br/>
                        <div class="card">
                            <div class="card-header">{{$calamity->calamityName}}</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <font color="#f08080"> Calamity Name: </font>
                                            </td>
                                            <td>
                                                {{$calamity->calamityName}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font color="#f08080"> Calamity Instruction:</font>
                                            </td>
                                            <td>
                                                {!! $calamity->description!!}
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
                                            <small>Written on {{$calamity->created_at}} </small>
                                                <BR/>
                                            <small>Updated on {{$calamity->updated_at}} </small>
                                        <hr/>
                                </div>
                            </div> <br/>
                                <table>
                                    <tr>

                                                <td>
                                                    <a href="/calamities/{{$calamity->calamityID}}/edit" class="btn btn-light">Edit Calamity</a>
                                                </td>


                                    </tr>
                                </table>
                                    <br/>
                        </div>
                </div>
            </div>
    </div>



@endsection