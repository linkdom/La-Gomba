<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $senderMail;
    public $subjectMail;
    public $bodyMail;

    /**
     * Create a new message instance.
     *
     * @param $senderMail
     * @param $subjectMail
     * @param $bodyMail
     */
    public function __construct($senderMail, $subjectMail, $bodyMail)
    {
        $this->senderMail = $senderMail;
        $this->subjectMail = $subjectMail;
        $this->bodyMail = $bodyMail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.contact')
            ->with([
                'senderMail' => $this->senderMail,
                'subjectMail' => $this->subjectMail,
                'bodyMail' => $this->bodyMail
            ]);
    }
}
