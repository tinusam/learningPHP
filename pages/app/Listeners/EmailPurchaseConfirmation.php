<?php

namespace App\Listeners;

use App\Events\PodcastWasPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Mail\Mailer;

class EmailPurchaseConfirmation implements ShouldQueue

{
    use InteractsWithQueue;
 
    public function handle(PodcastWasPurchased $event)
    {
        if (true) {
            $this->release(30);
        }
    }
}



//     public function __construct(Mailer $mailer)
//     {
//         $this->mailer = $mailer;
//     }
//     /**
//      * Handle the event.
//      *
//      * @param  PodcastWasPurchased  $event
//      * @return void
//      */
//     public function handle(PodcastWasPurchased $event)
//     {
//         // Access the podcast using $event->podcast...
//     }
// }