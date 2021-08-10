<?php

namespace App\Http\Livewire\Mails;

use Livewire\Component;
use app\Models\User;
use app\Models\AvisPermutation;
use Snowfire\Beautymail\Beautymail;

class EnvoiMailAuDemandeur extends Component
{

    public function Mails(User $avis)
    {

        $beautymail = app()->make(Beautymail::class);
            $beautymail->send('Mails.envoi-mail-au-demandeur', ['avis' => $avis], function($message)
            {
                $message
                    ->from('bar@example.com')
                    ->to('foo@example.com', 'John Smith')
                    ->subject('Notification');
            });

        return back();

    }

}
