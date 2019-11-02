<?php

namespace App\Listeners;

use App\Events\ConfirmationEvent;
use App\Mail\ConfirmationEmail;
use App\Mailing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
        $to = Mailing::all()->pluck('email');
        $name = Mailing::all()->pluck('name');
        Mail::to($to)->send(new ConfirmationEmail($event->mail, $name));
    }
}
