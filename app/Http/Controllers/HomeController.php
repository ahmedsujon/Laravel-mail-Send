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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('home');
    }


    public function sendMail()
    {
        $details['to'] = 'harsukh21@gmail.com';
        $details['name'] = 'Receiver Name';
        $details['subject'] = 'Hello Laravelcode';
        $details['message'] = 'Here goes all message body.';

        SendMailJob::dispatch($details);

        return response('Email sent successfully!!');
    }
}

