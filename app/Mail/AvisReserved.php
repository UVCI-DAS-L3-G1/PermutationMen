<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisReserved extends Mailable
{
    use Queueable, SerializesModels;
    public $avis;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($avis)
    {
        $this->avis = $avis;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.avis.reserved');
    }
}
