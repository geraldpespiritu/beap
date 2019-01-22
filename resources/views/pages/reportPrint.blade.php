<!DOCTYPE html>
<html lang="en">
<head>
    <title>BEAP</title>
    <style type="text/css">
        img.logo {
            position: absolute;
            right: 10px;
            padding-right: 8px;
            top: 4px;
        }

        table {
            font-size: 18px;
            border-collapse: collapse;
            width: 100%;
        }

        tr, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15px;
            text-align: center;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav, table, tr, td {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<div class="row">
    <div class="col-md-6">
        <img src="THESISLOGO.jpg" style="width:30%" class="logo"/>
    </div>
    <div class="col-md-6">
        <h1>BEAP</h1>
        <?php
        $script_tz = date_default_timezone_set("Asia/Hong_Kong");
        echo date("m-d-Y");
        ?>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<body>

<table>
    <tr>
        <td>Calamity Name</td>
        <td>Date and Time</td>
        <td>Remarks</td>
    </tr>
    @if(count($request) > 0)
        @foreach ($request as $request)
            <tr>
                <td>{{ $request->calamityName }}</td>
                <td>{{ $request->created_at }}</td>
                <td>{{ $request->remarks }}</td>
            </tr>
</table>
@endforeach
@else
    <div align="center">
        <h5 style="font-family:serif;">No records found.</h5>
    </div>
@endif

</body>
</html>