<?php

namespace App\Listeners;

use App\Models\ServiceProvider;
use App\Notifications\ServiceRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ServiceRequestedNotification
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
        $providers = ServiceProvider::get();
        Notification::send($providers, new ServiceRequested($event->user));
    }
}
