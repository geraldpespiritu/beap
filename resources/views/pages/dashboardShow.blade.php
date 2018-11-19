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
                                @if(count($vattendance) > 0)
                                    @foreach($vattendance as $vattendances)
                                        <tr>
                                            <td>{{$vattendances->timein}}</td>
                                            <td>{{$vattendances->timeout}}</td>
                                            <td>{{$vattendances->gatedesc}}</td>
                                        </tr>
                                    @endforeach

                                    <p>
                                        Status:
                                        @if ($vattendances->gatedesc != null && $vattendances->timeout != "0000-00-00 00:00:00")
                                            <b>Inactive</b>
                                        @elseif ($vattendances->gatedesc == null && $vattendances->timein == "0000-00-00 00:00:00" && $vattendances->timeout == "0000-00-00 00:00:00")
                                            <b>Inactive</b>
                                        @else
                                            <b>Active</b>
                                        @endif
                                    </p>
                            </table>

                            @else
                                <p>No records found</p>
                            @endif

                            {{$vattendance->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection