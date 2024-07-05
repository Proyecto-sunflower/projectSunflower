<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrollmentApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enrollmentData;

    /**
     * Create a new message instance.
     *
     * @param array $enrollmentData
     * @return void
     */
    public function __construct($enrollmentData)
    {
        $this->enrollmentData = $enrollmentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva solicitud de matrícula')
                    ->view('emails.enrollment_application');
    }
}

