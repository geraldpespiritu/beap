@extends('layouts.app')
@section('content')
<style type="text/css">
    table td, table th{
        border:1px solid black;
    }
</style>


<body>
<div class="container">
    <table>
        <tr>
            <td>Report ID</td>
            <td>User ID</td>
            <td>Calamity ID</td>
            <td>Remarks</td>
            <td>Date</td>
            <td>Status</td>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->reportID }}</td>
                <td>{{ $item->userID }}</td>
                <td>{{ $item->calamityID }}</td>
                <td>{{ $item->remarks }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
    <a href="{{action('ItemPrintController@reportPrint')}}" class="btn btn-default"><i class="mdi mdi-file-pdf"></i>PDF</a>
    <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i>Print</button>
@endsection
