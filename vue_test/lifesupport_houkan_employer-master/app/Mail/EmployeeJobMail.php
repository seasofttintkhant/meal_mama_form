<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Swift_Mime_ContentEncoder_PlainContentEncoder;

class EmployeeJobMail extends Mailable
{
    use Queueable, SerializesModels;


    private $job_data;

    private $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job_data,$email)
    {
        $this->job_data = $job_data;
        $this->email= $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->to($this->email)
        ->subject('New Matching Job Registered')
        ->with($this->job_data)
        ->view('email.new_job_notification_to_employers')
        ->withSwiftMessage(function ($message) {
            $message->setEncoder(new Swift_Mime_ContentEncoder_PlainContentEncoder('8bit'));
        });
    }
}
