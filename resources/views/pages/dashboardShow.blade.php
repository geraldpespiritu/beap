@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- DATE RANGE SCRIPT -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- END OF DATE RANGE SCRIPT -->
</head>
<body>
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">


                    <div class="card-body">
                        <div class="panel-body">

                           {{-- <div class="card-header">
                                <h3>{{$dashboard->fullname}}</h3>
                                <h4>{{$dashboard->idno}}</h4>
                            </div>--}}

                            <br/>

                            <div class="container">
                                <!-- DATE RANGE TIME IN -->
                                <div class="col-xs-6" align="center">
                                    <h7><b>Filter by Time in</b></h7>
                                    <form method="POST" action="{{action('DashboardController@userLogsFilter')}}">
                                        <input name="" type="hidden" value="">
                                        {{ csrf_field() }}
                                        From: <input type="text" id="datepickerfrom" name="start" value="{{date('Y-M-d')}}"/> &nbsp;
                                        To: <input type="text" id="datepickerpresent" name="end" value="{{date('Y-M-d')}}"/> &nbsp;
                                        <button type="submit" class="btn btn-warning btn-sm">Filter</button>
                                    </form>
                                </div>

                                <br/>
                                <br/>

                                <!-- DATE RANGE TIME OUT -->
                                <div class="col-xs-6" align="center">
                                    <h7><b>Filter by Time out</b></h7>
                                    <form method="POST" action="{{action('DashboardController@userLogsFilter2')}}">
                                        <input name="" type="hidden" value="">
                                        {{ csrf_field() }}
                                        From: <input type="text" id="datepickerfrom" name="start" value="{{date('Y-M-d')}}"/> &nbsp;
                                        To: <input type="text" id="datepickerpresent" name="end" value="{{date('Y-M-d')}}"/> &nbsp;
                                        <button type="submit" class="btn btn-warning btn-sm">Filter</button>
                                    </form>
                                </div>

                            </div>
                            <br/>
                            @if(count($vattendance) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Gate Entry / Exit</th>
                                </tr>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepickerfrom").datepicker({ maxDate: new Date(), dateFormat: "yy-mm-dd"});
        });
        $(function () {
            $("#datepickerpresent").datepicker({ maxDate: new Date(), dateFormat: "yy-mm-dd"});
        });
    </script>

</body>

</html>
@endsection