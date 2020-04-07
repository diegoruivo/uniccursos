<?php

namespace Unic\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use stdClass;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->inputs= $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('E-mail enviado pelo site');
        $this->from(MAIL_FROM_ADDRESS);




        Mail::to(MAIL_FROM_ADDRESS)->send(new sendMail());

        var_dump($inputs);

        return $this->view('web.mail.mail')->with([
            'inputs' => $this->inputs
        ]);


    }
}
