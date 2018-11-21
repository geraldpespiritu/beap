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

<style type="text/css">
    table td, table tr {
        border: 1px solid black;
    }

    img {
        display: block;
        width: 300%;
        height: 200%;
    }
</style>
<br/>
<body>
<table style="width:100%">
    <tr>
        <td><img src="THESISLOGO.jpg" style="width:30%"/></td>
        <td>
            <h1>BEAP</h1>
            <?php
            $script_tz = date_default_timezone_set("Asia/Hong_Kong");
            echo date("m-d-Y");
            ?>
        </td>
    <tr>
</table>
<br/>
<div class="container">

    <!-- DATE RANGE -->
    <div class="col-xs-6" align="center">
        <form method="POST" action="{{action('ItemController@reportsFilter')}}">
            <input name="" type="hidden" value="">
            {{ csrf_field() }}
            From: <input type="text" id="datepickerfrom" name="start" value="{{date('Y-M-d')}}"/> &nbsp;
            To: <input type="text" id="datepickerpresent" name="end" value="{{date('Y-M-d')}}"/> &nbsp;
            <button type="submit" class="btn btn-warning btn-sm">Filter</button>
        </form>
    </div>

    <br/>


    <div class="table-responsive">

        @if(count($items) > 0)

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Calamity Name</td>
                <td>Date and Time</td>
                <td>Remarks</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->calamityName }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->remarks }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @else
            <div align="center">
                <h5 style="font-family:serif;">No records found.</h5>
            </div>
        @endif

        {{$items->links()}}
    </div>
</div>
<a href="{{action('ItemPrintController@reportPrint')}}" class="btn btn-default"><i class="mdi mdi-file-pdf"></i>PDF</a>
<button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i>Print</button>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepickerfrom").datepicker({maxDate: new Date(), dateFormat: "yy-mm-dd"});
    });
    $(function () {
        $("#datepickerpresent").datepicker({maxDate: new Date(), dateFormat: "yy-mm-dd"});
    });
</script>

</html>

@endsection