<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Report;
use Illuminate\Http\Request;
use DB;
use PDF;


class ItemPrintController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportPrint(Request $request)
    {
        //$request = DB::table("reports")->get();
        $request = Report::SELECT('*')
            -> join('calamities', 'calamities.calamityID', '=', 'reports.calamityID')
            ->get();
        $pdf = PDF::loadView('pages.reportPrint', compact('request'));
        return $pdf->download('report.pdf');

//        if ($request->has('download')) {
//            $pdf = PDF::loadView('report');
//            return $pdf->download('report.pdf');
    }
}


