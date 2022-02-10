<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity as HelpersLogActivity;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{

    public function myTestAddToLog()
    {
        HelpersLogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = HelpersLogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }

}
