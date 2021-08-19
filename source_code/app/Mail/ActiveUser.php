<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActiveUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $confirmLink;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $confirmLink)
    {
        $this->user = $user;
        $this->confirmLink = $confirmLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jobfinder@gmail.com', 'Job Finder')
                    ->subject('Xác nhận địa chỉ mail')
                    ->replyTo('JobFinder@gmail.com', 'tim viec')
                    ->view('frontend.mails.notify-active');
    }
}
