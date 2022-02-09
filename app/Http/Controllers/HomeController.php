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
