<?php

namespace App\Http\Controllers;
use App\Vattendance;
use App\Vidinfo;
use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{

    public function index()
    {
        $dashboard = Vidinfo::paginate(10);
//        dd($dashboard);
        return view('pages.dashboard', compact('dashboard'));

        /*mysqli_query($con, "SELECT COUNT(infonet)FROM Vattendance");*/
    }

    public function show($idno)
    {
      $dashboard = Vidinfo::find($idno);
      /*dd($dashboard);*/
        $vattendance = Vattendance::where('idno', $idno)
            /*->orderBy('timein', 'asc')->where('timein', '!=','0000-00-00 00:00:00')*/
            ->paginate(10);

    /* dd($vattendance);*/
           return view('pages.dashboardShow')->with(['dashboard' => $dashboard, 'vattendance' => $vattendance]);
    }
}

/*$calamities  = Calamity::orderBy('created_at', 'desc')->paginate(10);
return view('calamities.index')->with('calamities', $calamities);*/