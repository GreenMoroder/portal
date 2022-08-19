<?php

namespace App\Listeners;

use App\Events\AreaAttach;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AreaAttachNotification
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
     * @param  \App\Events\AreaAttach  $event
     * @return void
     */
    public function handle(AreaAttach $event)
    {
        //
    }
}
