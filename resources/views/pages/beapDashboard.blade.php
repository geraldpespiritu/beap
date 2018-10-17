@extends('layouts.app')

@section('content')
    <br/>
          {{--  <div class="well list-group-item">

               <div classs="col-md-8 col-sm-8">
                    <small>Status {{$user->userStatus}}</small>
                </div>

            </div>--}}
            <br/>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                   <div class="card-header"><h1>BEAP Dashboard</h1></div>

                    <div class="card-body">

                        <div class="panel-body">

                            <table class="table table-striped">
                                <tr>
                                    <th>ID number</th>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Status</th>
                                </tr>
                                @foreach($data as $value)
                                    <tr>
                                        <td>{{$value->idno}}</td>
                                        <td>{{$value->timein}}</td>
                                        <td>{{$value->timeout}}</td>
                                        <td>
                                            @if (($value->timein) == '0000-00-00 00:00:00')
                                                <p>Inactive</p>
                                            @else
                                                <p>Active</p>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection