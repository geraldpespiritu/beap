

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
            @foreach ($request as $request)
                <tr>
                    <td>{{ $request->reportID }}</td>
                    <td>{{ $request->userID }}</td>
                    <td>{{ $request->calamityID }}</td>
                    <td>{{ $request->remarks }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    </body>
