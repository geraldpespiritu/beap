@extends('layouts.app')
@section('content')

        <!DOCTYPE html>
<html lang="en">
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
    <div class="table-responsive">
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
    </div>
</div>
<a href="{{action('ItemPrintController@reportPrint')}}" class="btn btn-default"><i class="mdi mdi-file-pdf"></i>PDF</a>
<button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i>Print</button>
@endsection
</body>
</html>

