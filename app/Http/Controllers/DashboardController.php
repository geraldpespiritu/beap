<?php

namespace App\Http\Controllers;
use App\Vattendance;
use App\Vidinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
class DashboardController extends Controller
{

    public function index()
    {
        $dashboard = Vidinfo::paginate(10);
//        dd($dashboard);
        return view('pages.dashboard', compact('dashboard'));

    }

    public function show($idno)
    {

      $dashboard = Vidinfo::find($idno);
      /*dd($dashboard);*/
        $vattendance = Vattendance::where('idno', $idno)
            /*->orderBy('timein', 'asc')->where('timein', '!=','0000-00-00 00:00:00')*/
            ->paginate(10);

           return view('pages.dashboardShow')->with(['dashboard' => $dashboard, 'vattendance' => $vattendance]);
    }

    public function userLogsFilter(Request $request, $idno)
    {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $vattendance = Vattendance::orderBy('timein', 'desc')
            -> whereBetween($idno.'timein', array(new Carbon($start), new Carbon($end)))
            -> paginate(10);

        return view('pages.dashboardShow', compact('vattendance'))->with(['vattendance' => $vattendance]);

    }

    public function userLogsFilter2(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $vattendance = Vattendance::orderBy('timeout', 'desc')
            -> whereBetween('timeout', array(new Carbon($start), new Carbon($end)))
            -> paginate(10);

        return view('pages.dashboardShow', compact('vattendance'))->with(['vattendance' => $vattendance]);

    }

}