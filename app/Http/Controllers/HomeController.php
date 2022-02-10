<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Send email.
     *
     * @return void
     */

    public function index()
    {
        return view('home');
    }

}
