<?php

namespace App\Listeners;

use App\Mail\ConfirmationEmail;
use App\Mailing;
use Illuminate\Support\Facades\Mail;

class SendConfirmationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $tos = Mailing::all();
        foreach ($tos as $to){
            Mail::to($to->email)->send(new ConfirmationEmail($event->mail, $to->name));
        }
    }
}
