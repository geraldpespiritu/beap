@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$dashboard->fullname}}</h3>
                        <h5>{{$dashboard->idno}}</h5>

                    </div>

                    <div class="card-body">

                        <div class="panel-body">


                            <table class="table table-striped">

                                <tr>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Gate Entry / Exit</th>
                                </tr>

                                @foreach($vattendance as $vattendance)
                                    <tr>
                                        <td>{{$vattendance->timein}}</td>
                                        <td>{{$vattendance->timeout}}</td>
                                        <td>{{$vattendance->gatedesc}}</td>
                                    </tr>
                                @endforeach

                                <p>
                                    Status:
                                    @if ($vattendance->gatedesc != null && $vattendance->timeout != "0000-00-00 00:00:00")
                                        <b>Inactive</b>
                                    @elseif ($vattendance->gatedesc == null && $vattendance->timein == "0000-00-00 00:00:00" && $vattendance->timeout == "0000-00-00 00:00:00")
                                        <b>Inactive</b>
                                    @else
                                        <b>Active</b>
                                    @endif
                                </p>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection