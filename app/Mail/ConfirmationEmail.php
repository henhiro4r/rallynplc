<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $name)
    {
        $this->mail = $mail;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail['subject'])->markdown('ConfirmationEmail');
    }
}
