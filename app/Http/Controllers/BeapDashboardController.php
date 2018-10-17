<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BeapDashboardController extends Controller
{
    function getUsers()
    {
        $data['data'] = DB::table('vattendance')->get();

        if(count($data) > 0){
            return view('pages.beapDashboard', $data);
        } else{
            return view('pages.beapDashboard');
        }

       /* if(auth()->user()->id !== auth()->user()->id){
            return redirect('/about')->with('error', 'Unauthorized Page');
        }*/
    }
}
