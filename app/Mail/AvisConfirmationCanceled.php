<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisConfirmationCanceled extends Mailable
{
    use Queueable, SerializesModels;

    public $avis;
    public $agent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($avis,$agent)
    {
        $this->avis = $avis;
        $this->agent = $agent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.avis.confirmation-canceled');
    }
}
