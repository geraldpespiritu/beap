@extends('layouts.app')

@section('content')
    <br/>

    {{--  <p>
          Status:
          @if ($dashboard->full && $vattendance->timeout != "0000-00-00 00:00:00")
              <b>Inactive</b>
          @else
              <b>Active</b>
          @endif
      </p>--}}

    <br/>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header"><h1>Users</h1></div>
                    <div class="card-body">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Full name</th>
                                </tr>

                                @foreach($dashboard as $value)
                                    <tr>
                                        @if (substr($value->idno, 1, 1) != "1")

                                            <td><a href="dashboard/{{$value->idno}}"> {{$value->fullname}}</a></td>
                                        @else
                                            <p>Employees</p>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            {{$dashboard->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection