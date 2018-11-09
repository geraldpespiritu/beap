<!DOCTYPE html>
<html lang="en">
<head>
    <title>BEAP</title>
    <style type="text/css">

        table tr, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15px;
            text-align: center;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav, table, th, td {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
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
    <body>
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
            @foreach ($request as $request)
                <tr>
                    <td>{{ $request->calamityName }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->remarks }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    </div>
    </body>
</html>
