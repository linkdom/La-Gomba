<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendingController extends Controller
{
    public function sendMail(Request $request) {

        $senderMail = $request->get('email');
        $subjectMail = $request->get('subject');
        $bodyMail = $request->get('body');

        if (!empty($senderMail) && !empty($subjectMail) && !empty($bodyMail) ) {
            Mail::to('office@linkdom.at')->send(new Contact($senderMail, $subjectMail, $bodyMail));

            return redirect()->back()->with('message', 'E-Mail successfully sent');
        } else {
            return redirect()->back()->with('message', 'All Fields are required');
        }

    }

}
