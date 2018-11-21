<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use PDF;

class ItemController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
//        $items = DB::table("reports")->get();
//        $name = DB::table('reports')
//            ->join('calamities', 'reports.calamityID', '=', 'calamities.calamityID')
//            ->select('calamities.name')
//            ->first();
        $items = Report::SELECT('*')
            -> join('calamities', 'calamities.calamityID', '=', 'reports.calamityID')
            -> paginate(10);
        return view('pages.report', compact('items'));

//        if ($request->has('download')) {
//            $pdf = PDF::loadView('report');
//            return $pdf->download('report.pdf');
    }

    public function reportsFilter(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $items = Report::orderBy('created_at', 'desc')
            -> whereBetween('created_at', array(new Carbon($start), new Carbon($end)))
            -> paginate(10);

        return view('pages.report', compact('items'));

    }


}


