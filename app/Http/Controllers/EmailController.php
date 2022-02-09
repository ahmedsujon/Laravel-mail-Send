<?php

namespace App\Http\Controllers;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create()
    {

        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'content' => 'required',
        ]);

        // $details = [
        //   'subject' => $request->subject,
        //   'email' => $request->email,
        //   'content' => $request->content
        // ];

        $details['to'] = 'harsukh21@gmail.com';
        $details['email'] = $request->email;
        $details['subject'] = $request->subject;
        $details['content'] = $request->content;

        SendMailJob::dispatch($details);

        // SendMailJob::dispatch($details);
        // ->delay(now()->addMinutes(5));

        // Mail::send('email-template', $data, function($message) use ($data) {
        //   $message->to($data['email'])
        //   ->subject($data['subject']);
        // });


        return back()->with(['message' => 'Email successfully sent!']);
    }
}
