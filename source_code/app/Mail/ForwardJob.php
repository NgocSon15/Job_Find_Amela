<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForwardJob extends Mailable
{
    use Queueable, SerializesModels;
    public $link;
    public $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link, $job)
    {
        $this->link = $link;
        $this->job = $job;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jobfinder@gmail.com', 'Job Finder')
                    ->subject('Job Finder')
                    ->replyTo('JobFinder@gmail.com', 'Job Finder')
                    ->view('frontend.mails.forward-job');
    }
}
