<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
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
        $items = DB::table("reports")->get();
        return view('pages.report', compact('items'));


//if($request->has('download')){
//$pdf = PDF::loadView('report');
//return $pdf->download('report.pdf');
    }
}


