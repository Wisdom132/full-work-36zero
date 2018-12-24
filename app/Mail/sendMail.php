<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $body;
    public $sender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $body, $sender)
    {
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        
    }
}
