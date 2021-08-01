<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use app\Models\AvisPermutation;

class EnvoiMailAuDemandeur extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AvisPermutation $avis)
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
        $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('Mails.envoi-mail-au-demandeur', ['avis' => $avis], function($message)
            {
                $message
                    ->from('bar@example.com')
                    ->to('foo@example.com', 'John Smith')
                    ->subject('Welcome!');
            }
    }
