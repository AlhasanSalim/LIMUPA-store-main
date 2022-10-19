<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendOrderCreatedNotification
{
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $user = User::where('store_id', '=', $order->store_id)->first();
        $user->notify(new OrderCreatedNotification($order));
    }
}
